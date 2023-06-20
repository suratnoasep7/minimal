<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('HtmlBoxOpen')) {
	function HtmlBoxOpen($toolbar_title, $atribut = "", $overflow = "auto")
	{
		$return = '<section class="content container-fluid" ' . $atribut . '>';
		$return .= '<div class="box box-solid">';
		$return .= '<div class="box-header with-border"> ';
		$return .= '<h3 class="box-title">' . $toolbar_title . '</h3>';
		$return .= '</div>';
		$return .= '<div class="box-body" style="overflow:' . $overflow . ';">';
		return $return;
	}
}

if (!function_exists('HtmlBoxOpenV2')) {
	function HtmlBoxOpenV2($toolbar_title, $atribut = "", $overflow = "auto", $pull_right = "")
	{
		$return = '<section class="content container-fluid" ' . $atribut . '>';
		$return .= '<div class="box box-solid">';
		$return .= '<div class="box-header with-border"> ';
		$return .= '<h3 class="box-title">' . $toolbar_title . '</h3>';
		$return .= '<div class="pull-right">' . $pull_right . '</div>';
		$return .= '</div>';
		$return .= '<div class="box-body" style="overflow:' . $overflow . ';">';
		return $return;
	}
}

if (!function_exists('HtmlBoxOpenV3')) {
	function HtmlBoxOpenV3($toolbar_title, $atribut = "", $overflow = "auto", $pull_right = "", $colboostrap = "col-lg-12")
	{
		$return = '<section class="content container-fluid ' . $colboostrap . '" ' . $atribut . '>';
		$return .= '<div class="box box-solid">';
		$return .= '<div class="box-header with-border"> ';
		$return .= '<h3 class="box-title">' . $toolbar_title . '</h3>';
		$return .= '<div class="pull-right">' . $pull_right . '</div>';
		$return .= '</div>';
		$return .= '<div class="box-body" style="overflow:' . $overflow . ';">';
		return $return;
	}
}

if (!function_exists('HtmlBoxClose')) {
	function HtmlBoxClose()
	{
		$return = '</div>';
		$return .= '</div> ';
		$return .= '</section>';
		return $return;
	}
}

if (!function_exists('HtmlBoxCmsOpen')) {
	function HtmlBoxCmsOpen($toolbar_title, $atribut, $colboostrap = "col-lg-10")
	{
		$return = '<div class="' . $colboostrap . '" >';
		$return .= '<div class="widget">';
		$return .= '<div class="widget-header">';
		$return .= '<h3>' . $toolbar_title . '</h3>';
		$return .= '</div>';
		$return .= '<div class="widget-content" ' . $atribut . ' ">';
		return $return;
	}
}


if (!function_exists('HtmlBoxCmsClose')) {
	function HtmlBoxCmsClose()
	{
		$return = '</div>';
		$return .= '</div> ';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlBoxCmsNoHeaderOpen')) {
	function HtmlBoxCmsNoHeaderOpen($atribut, $colboostrap = "col-lg-10")
	{
		$return = '<div class="' . $colboostrap . '" >';
		$return .= '<div class="widget">';
		$return .= '<div class="widget-content" ' . $atribut . ' ">';
		return $return;
	}
}


if (!function_exists('HtmlBoxNoHeaderOpen')) {
	function HtmlBoxNoHeaderOpen($atribut = "", $overflow = "auto")
	{
		$return = '<section class="content container-fluid" ' . $atribut . '>';
		$return .= '<div class="box box-solid">';
		$return .= '<div class="box-body" style="overflow:' . $overflow . ';">';
		return $return;
	}
}

if (!function_exists('HtmlInput')) {
	function HtmlInput($type, $name, $value, $atribut = "")
	{
		$return = '<input type="' . $type . '" name="' . $name . '" value="' . $value . '" ' . $atribut . '>';
		return $return;
	}
}

if (!function_exists('HtmlOptionLabel')) {
	function HtmlOptionLabel($label, $name, $list_option, $value, $atribut, $colboostrap = "")
	{
		$return = '<div class="form-group ' . $colboostrap . '">';
		$return .= '<label for="" class="col-sm-2 control-label">' . $label . '</label>';
		$return .= '<div class="col-sm-10">';
		$return .= form_dropdown($name, $list_option, $value, '',  $atribut);
		$return .= '</div>';
		$return .= '</div>';
		return $return;
	}
}
if (!function_exists('HtmlOptionLabelV2')) {
	function HtmlOptionLabelV2($label, $name, $list_option, $value, $atribut, $colboostrap = "")
	{
		$return = '<div class="form-group ' . $colboostrap . '">';
		$return .= '<label for="" class="col-sm-12 control-label" style="padding:0px;">' . $label . '</label>';
		$return .= '<div class="col-sm-12"  style="padding:0px;">';
		$return .= form_dropdown($name, $list_option, $value, '',  $atribut);
		$return .= '</div>';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlOptionLabelV3')) {
	function HtmlOptionLabelV3($label, $name, $list_option, $value, $atribut, $colboostrap)
	{
		$return = '<div class="form-group ' . $colboostrap . '">';
		// $return .= '<label>' . $label . '</label>';
		$return .= form_dropdown($name, $list_option, $value, $label,  $atribut);
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlInputLabel')) {
	function HtmlInputLabel($label, $name, $value, $atribut, $atributDiv = 'class="form-group"')
	{
		$return = '<div ' . $atributDiv . '>';
		$return .= '<label class="col-sm-2 control-label">' . $label . '</label>';
		$return .= '<div class="col-sm-10">';
		$return .= '<input type="text" name="' . $name . '" value="' . $value . '" ' . $atribut . '>';
		$return .= '</div>';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlInputFileLabel')) {
	function HtmlInputFileLabel($label, $name, $value, $atribut, $atributDiv = 'class="form-group"')
	{
		$return = '<div ' . $atributDiv . '>';
		$return .= '<label class="col-sm-2 control-label">' . $label . '</label>';
		$return .= '<div class="col-sm-10">';
		$return .= '<input type="file" name="' . $name . '" value="' . $value . '" ' . $atribut . '>';
		$return .= '</div>';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlInputLabelBtnGroup')) {
	function HtmlInputLabelBtnGroup($label, $name, $value, $atribut, $btngroup, $atributDiv = 'class="form-group"')
	{
		$return = '<div ' . $atributDiv . '>';
		$return .= '<label class="col-sm-2 control-label">' . $label . '</label>';
		$return .= '<div class="col-sm-10">';
		$return .= '<div class="input-group">';
		$return .= '<input type="text" name="' . $name . '" value="' . $value . '" ' . $atribut . '>';
		$return .= '<span class="input-group-btn">';
		$return .= $btngroup;
		$return .= '</span>';
		$return .= '</div>';
		$return .= '</div>';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlInputLabelV2')) {
	function HtmlInputLabelV2($label, $name, $value, $atribut, $colboostrap = "")
	{
		$return = '<div class="form-group ' . $colboostrap . '">';
		$return .= '<label>' . $label . '</label>';
		$return .= '<input type="text" name="' . $name . '" value="' . $value . '" ' . $atribut . '>';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlButtonForm')) {
	function HtmlButtonForm($url_back = "", $text_button = '<i class="fa fa-check"></i> Simpan ', $colboostrap = "")
	{
		$return = '<div class="btn-group btn-group-justified ' . $colboostrap . '" role="group" aria-label="..."> ';
		$return .= '<div class="btn-group" role="group"> ';
		$return .= '<button type="submit" name="simpan" id="simpan" class="btn btn-primary simpan" value="simpan" style="width: 100%"> ';
		$return .= $text_button;
		$return .= '</button> ';
		$return .= '</div> ';
		if (!empty($url_back)) {
			$return .= '<div class="btn-group" role="group"> ';
			$return .= '<a href="' . site_url() . $url_back . '" class="btn btn-danger back"><i class="fa fa-arrow-left"></i> Kembali </a> ';
			$return .= '</div> ';
		}
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlButton')) {
	function HtmlButton($type, $text_button, $atribut, $colboostrap = "")
	{
		$return = '<div class="btn-group btn-group-justified ' . $colboostrap . '" role="group" aria-label="..."> ';
		$return .= '<div class="btn-group" role="group"> ';
		$return .= '<button type="' . $type . '" class="btn btn-primary" ' . $atribut . '> ';
		$return .= $text_button;
		$return .= '</button> ';
		$return .= '</div> ';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlButtonV2')) {
	function HtmlButtonV2($type, $text_button, $atribut, $colboostrap = "")
	{
		$return = '<div class="btn-group' . $colboostrap . '" role="group" aria-label="..."> ';
		$return .= '<div class="btn-group" role="group"> ';
		$return .= '<button type="' . $type . '" class="btn btn-primary" ' . $atribut . '> ';
		$return .= $text_button;
		$return .= '</button> ';
		$return .= '</div> ';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlButtonV3')) {
	function HtmlButtonV3($type, $text_button, $atribut, $colboostrap = "")
	{
		$return = '<div class="btn-group' . $colboostrap . '" role="group" aria-label="..."> ';
		$return .= '<div class="btn-group" role="group"> ';
		$return .= '<button type="' . $type . '" ' . $atribut . '> ';
		$return .= $text_button;
		$return .= '</button> ';
		$return .= '</div> ';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlCallout')) {
	function HtmlCallout($text, $class = "info", $atribut = "")
	{
		$return = '<div class="callout callout-' . $class . '" ' . $atribut . '>';
		$return .= $text;
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlCalloutCustom')) {
	function HtmlCalloutCustom($text, $class = "col-md-3", $enter = "0", $classstyle = "info", $atribut = 'style="border-radius:0px 300px 300px 0px ; padding-top:8px; padding-bottom:8px;"')
	{
		$return = '';
		for ($i = 0; $i < $enter; $i++) {
			$return .= '<div class="col-md-12">&nbsp;</div>';
		}
		$return .= '<div class="row">';
		$return .= '<div class="' . $class . '" style="padding:0px;">';
		$return .= HtmlCallout($text, $classstyle, $atribut);
		$return .= '</div>';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlAlert')) {
	function HtmlAlert($text, $class = "info", $atribut = "")
	{
		$return = '<div class="alert-' . $class . '" ' . $atribut . '>';
		$return .= $text;
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlOverlay')) {
	function HtmlOverlay()
	{
?>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#overlay").fadeOut("slow", function() {
					// Animation complete.
				});
			});
		</script>
		<div id="overlay">
			<div id="text">
				<h2 class="text-center">
					<!-- <img src="<?php echo base_url('logo.svg') ?>" alt="logo" height="32px" width="auto" class="text-center"><br> -->
					<i class="fa fa-spinner fa-spin"></i>
					Sedang memuat data
				</h2>
			</div>
		</div>
		<style>
			#overlay {
				position: fixed;
				display: block;
				width: 100%;
				height: 100%;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background-color: rgba(0, 0, 0, 0.5);
				z-index: 9999;
				cursor: pointer;
			}

			#overlay #text {
				position: absolute;
				top: 50%;
				left: 50%;
				color: white;
				transform: translate(-50%, -50%);
				-ms-transform: translate(-50%, -50%);
			}
		</style>
	<?php
	}
}

if (!function_exists('infoBoxDashboard')) {

	function infoBoxDashboard($iconBox, $textBox, $numberBox, $linkBox, $bgBox = "bg-red", $colBox = "col-md-4")
	{
	?>
		<div class="<?= $colBox; ?>">
			<div class="info-box <?= $bgBox; ?>">
				<span class="info-box-icon">
					<i class="fa <?= $iconBox; ?>"></i>
				</span>
				<div class="info-box-content">
					<span class="info-box-text"><?= $textBox; ?></span>
					<span class="info-box-number"><?= $numberBox; ?></span>
					<div class="progress">
						<div class="progress-bar" style="width: 100%"></div>
					</div>
					<?php
					if ($linkBox <> "") {
					?>
						<span class="progress-description">
							<a href="<?= $linkBox ?>">Lihat Selengkapnya</a>
						</span>
					<?php
					}
					?>

				</div>

			</div>
		</div>
	<?php
	}
}

if (!function_exists('HtmlModalOpen')) {
	function HtmlModalOpen($toolbar_title, $atribut = "", $reload = false, $overflow = "auto")
	{
	?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#modalform').modal('show');
				<?php
				if ($reload === true) {
				?>
					$('#modalform').on('hidden.bs.modal', function() {
						location.reload();
					});
				<?php
				}
				?>
			});
		</script>
	<?php
		$return = '<div id="modalform" class="modal fade" data-backdrop="static" data-keyboard="false" ' . $atribut . '>';
		$return .= '<div class="modal-dialog modal-lg" style="width: 90%;">';
		$return .= '<div class="modal-content">';
		$return .= '<div class="modal-header bg-blue">';
		$return .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>';
		$return .= '<h4 class="modal-title">' . $toolbar_title . '</h4>';
		$return .= '</div>';
		$return .= '<div class="modal-body" style="overflow:' . $overflow . '">';
		return $return;
	}
}

if (!function_exists('HtmlModalClose')) {
	function HtmlModalClose()
	{
		$return = '</div>';
		$return .= '</div>';
		$return .= '</div>';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlTextAreaLabelV2')) {
	function HtmlTextAreaLabelV2($label, $name, $value, $atribut, $colboostrap = "")
	{
		$return = '<div class="form-group ' . $colboostrap . '">';
		$return .= '<label>' . $label . '</label>';
		$return .= '<textarea name="' . $name . '" ' . $atribut . '>';
		$return .= $value;
		$return .= '</textarea>';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('HtmlInputFileLabelV2')) {
	function HtmlInputFileLabelV2($label, $name, $value, $atribut, $colboostrap = "")
	{
		$return = '<div class="form-group ' . $colboostrap . '">';
		$return .= '<label>' . $label . '</label>';
		$return .= '<input type="file" name="' . $name . '" value="' . $value . '" ' . $atribut . '>';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('ToggleNav')) {
	function ToggleNav($menu = "nomenuselected", $submenu = "nomenuselected")
	{
	?>
		<script>
			$(document).ready(() => {
				// remove opened nav
				$(".hoe-has-menu.opened").removeClass('opened')

				var master = $('.hoe-has-menu a span:contains("<?= $menu ?>")')
				var masterP1 = master.parent()
				var masterP2 = masterP1.parent()
				var child = masterP1.next()
				var currentChild = child.children(':contains("<?= $submenu ?>")')
				masterP2.addClass("opened") // toogle parent
				currentChild.addClass('active') // select current child
			})
		</script>
<?php
	}
}




if (!function_exists('LumaHTMLOpen')) {
	function LumaHTMLOpen($toolbar_title)
	{
		$return = '';
		$return .= '<div class="mdk-header-layout__content">';
		$return .= '<div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px"> ';
		$return .= '<div class="mdk-drawer-layout__content page-content">';
		$return .= '<div class="fluid-container page__container">';
		$return .= '<div class="page-section" style="padding: 0;">';
		$return .= '<div class="mb-lg-8pt"> ';
		$return .= '<div class="flex d-flex flex-column flex-sm-row align-items-left mb-24pt mb-md-0">';
		$return .= '<div class="mb-24pt mb-sm-0 mr-sm-24pt"> ';
		$return .= '<h2 class="mb-0">' . $toolbar_title . '</h2>';
		// $return .= '<ol class="breadcrumb p-0 m-0"> ';
		// $return .= '<li class="breadcrumb-item"><a href="">' . strtoupper($this->uri->segment(2)) . '</a></li>';
		// $return .= '<li class="breadcrumb-item active"> ';
		// $return .= strtoupper($this->uri->segment(3));
		// $return .= '</li> ';
		// $return .= '</ol>';
		$return .= '</div> ';
		$return .= '</div>';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('LumaHTMLClose')) {
	function LumaHTMLClose()
	{
		$return = '';
		$return .= '</div>';
		$return .= '</div>';
		return $return;
	}
}

if (!function_exists('LumaCardOpen')) {
	function LumaCardOpen($toolbar_title)
	{
		$return = '';
		$return .= '<div class="page-separator">';
		$return .= '<div class="page-separator__text">' . $toolbar_title . ' </div>';
		$return .= '</div>';

		$return .= '<div class="row card-group-row mb-lg-8pt">';
		$return .= '<div class="col-sm-12 card-group-row__col">';
		$return .= '<div class="card overlay--show card-lg overlay--primary-dodger-blue stack stack--1 card-group-row__card">';
		$return .= '<div class="card-body d-flex flex-column">';
		return $return;
	}
}


if (!function_exists('LumaCardClose')) {
	function LumaCardClose()
	{
		$return = '';
		$return .= '</div>';
		$return .= '</div>';
		$return .= '</div>';
		$return .= '</div>';
		return $return;
	}
}


/* End of file html+helper.php */
/* Location: ./application/helpers/html+helper.php */
