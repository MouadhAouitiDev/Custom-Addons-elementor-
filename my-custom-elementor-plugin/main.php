<?php
namespace mouadh;
if (!defined('ABSPATH')) exit;
class E_mouadh
{
   public function __construct() //Dans le constructeur, comme dans le REDO JSComposer Additional, on inclut le hook’i.
   {
      add_action('init', [$this, 'check_for_install']); //lors du lancement de notre plugin, nous ajoutons la vérification de l’installation des plugins nécessaires au bon fonctionnement de notre plugin, à savoir : ACF, CPT UI, Elementor,
      add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']); // ici nous enregistrons notre widget en utilisant la fonction register_widgets().
   }

   private function include_widgets_files()
   {
      require_once(__DIR__ . '/widgets/projet_mouadh.php');
   }

   public function register_widgets()
   {
      $this->include_widgets_files();
      \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\projet_mouadh());
   }
   public function check_for_install()
   {
      E_mouadh::show_mouadh_warning();
      return;
   }
   private function show_mouadh_warning()
   {
      if (!defined('ELEMENTOR_VERSION')) {
         $link = "https://pl.wordpress.org/plugins/elementor/";
         $plugin = "Elementor Page Builder";
?>
         <div class="notice notice-warning is-dismissible">
            <p>Please install <a href="<?php echo $link; ?>"><?php echo $plugin; ?></a> to use mouadh JSComposer
               Additional.</p>
         </div>
      <?php
      }
      if (!defined('CPT_VERSION')) {
         $link = "https://pl.wordpress.org/plugins/custom-post-type-ui/";
         $plugin = "Custom Post Type UI";
      ?>
         <div class="notice notice-warning is-dismissible">
            <p>Please install <a href="<?php echo $link; ?>"><?php echo $plugin; ?></a> to use mouadh JSComposer
               Additional.</p>
         </div>
      <?php
      }
      if (!defined('ACF_VERSION')) {
         $link = "https://pl.wordpress.org/plugins/advanced-custom-fields/";
         $plugin = "Advanced Custom Fields";
      ?>
         <div class="notice notice-warning is-dismissible">
            <p>Please install <a href="<?php echo $link; ?>"><?php echo $plugin; ?></a> to use mouadh JSComposer
               Additional.</p>
         </div>
<?php
      }
   }
}
