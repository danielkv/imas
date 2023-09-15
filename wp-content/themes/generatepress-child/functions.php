<?php

add_action("after_setup_theme", function () {
	remove_all_actions('generate_credits');

	add_action('generate_credits', function () {
		echo 'IMAS &copy; 2018 | Todos os direitos reservados';
	});
}, 99);

add_action('wp_enqueue_scripts', 'load_dashicons_front_end');
function load_dashicons_front_end()
{
	wp_enqueue_style('dashicons');
}

add_action('pre_get_posts', 'my_change_sort_order');
function my_change_sort_order($query)
{
	if (!$query->is_main_query()) return;

	if (is_post_type_archive('trabalho')) {
		//If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )

		$query->set('meta_key', 'order');
		$query->set('orderby', 'meta_value_num');
		$query->set('order', 'ASC');
	}

	if (is_archive() && is_tax('unidaderelatorios')) {
		if (isset($_GET['ano']) && $year = $_GET['ano']) {
			$query->set('year', $year);
		}
		if (isset($_GET['mes']) && $month = $_GET['mes']) {
			$query->set('monthnum', $month);
		}
	}
};

add_shortcode('date_filter', 'date_filter_shortcode');
function date_filter_shortcode()
{
	$initialYear = 2016;
	$currentYear = date('Y');

	$subtract = $currentYear - $initialYear;

	$initialDate = date('Y-m-d');
	$yearOptions = "<option value=''>Filtrar ano</option>";

	if (isset($_GET['ano'])) {
		$currentYearSelected = $_GET['ano'];
	} else {
		$currentYearSelected = '';
	}

	for ($i = $subtract; $i >= 0; $i--) {
		$yearStr = strtotime($initialDate . ' -' . $i . ' year');
		$year =  date('Y', $yearStr);

		$selected = $currentYearSelected == $year ? 'selected=\'selected\'' : '';

		$yearOptions .= "<option " . $selected . " value='" . $year . "'>" . $year . "</option>";
	}

	$yearFilter = "<select onChange='onFilter(this, \"ano\");'>" . $yearOptions . "</select>";

	// ----------------------------------------------

	$monthOptions = "<option value=''>Filtrar mês</option>";

	if (isset($_GET['mes'])) {
		$currentMonthSelected = $_GET['mes'];
	} else {
		$currentMonthSelected = '';
	}

	for ($i = 1; $i <= 12; $i++) {
		$month = translateMonth($i);

		$selected = $currentMonthSelected == $i ? 'selected=\'selected\'' : '';

		$monthOptions .= "<option " . $selected . " value='" . $i . "'>" . $month . "</option>";
	}

	$monthFilter = "<select onChange='onFilter(this, \"mes\");'>" . $monthOptions . "</select>";

	// ----------------------------------------------

	$availableCategories = array(
		array(
			'name' => 'Contrato de Gestão',
			'slug' => 'contratos-de-gestao'
		),
		array(
			'name' => 'Relatório de Atividade Assistencial ',
			'slug' => 'relatorio-de-atividades'
		),
		array(
			'name' => 'Prestação de Contas',
			'slug' => 'prestacao-de-contas'
		),
		array(
			'name' => 'Balancete/Planilha Assistencial',
			'slug' => 'balancete-planilha-assistencial'
		),
		array(
			'name' => 'Balanço Patrimonial',
			'slug' => 'balanco-patrimonial'
		)
	);
	$categoriesOptions = "<option value=''>Filtrar categoria</option>";

	if (isset($_GET['categoria-relatrio'])) {
		$currentCategorySelected = $_GET['categoria-relatrio'];
	} else {
		$currentCategorySelected = '';
	}

	for ($i = 0; $i < count($availableCategories); $i++) {
		$category = $availableCategories[$i];
		$label = $category['name'];
		$value = $category['slug'];

		$selected = $currentCategorySelected == $value ? 'selected=\'selected\'' : '';

		$categoriesOptions .= "<option " . $selected . " value='" . $value . "'>" . $label . "</option>";
	}

	$categoryFilter = "<select onChange='onFilter(this, \"categoria-relatrio\");'>" . $categoriesOptions . "</select>";

	// ----------------------------------------------

	$functions = "
		<script>
			function onFilter(e, param) {
				const urlSearchParams = new URLSearchParams(window.location.search);
				const value = e.value;

				if (!value) {
					urlSearchParams.delete(param);
				} else {
					urlSearchParams.set(param, value);
				}

				location.href = '?'+urlSearchParams.toString();
			}
		</script>
	";



	return $functions . $categoryFilter . $yearFilter . $monthFilter;
}

function translateMonth($monthnum)
{
	$map = array(
		1 => 'Janeiro',
		2 => 'Fevereiro',
		3 => 'Março',
		4 => 'Abril',
		5 => 'Maio',
		6 => 'Junho',
		7 => 'Julho',
		8 => 'Agosto',
		9 => 'Setembro',
		10 => 'Outubro',
		11 => 'Novembro',
		12 => 'Dezembro',
	);

	return $map[$monthnum];
}