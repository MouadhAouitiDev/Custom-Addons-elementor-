<?php
namespace mouadh\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
if ( ! defined( 'ABSPATH' ) ) exit;
class projet_mouadh extends Widget_Base {
   public function get_name() {
      return 'projet_mouadh';
   }
   public function get_title() {
      return __( 'projet_mouadh' );
   }
   public function get_icon() {
      return 'fa fa-eye';
   }
   public function get_categories(){
      return ['general'];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'section_content',
         [
           'label' => 'Settings',
         ]
       );
       $this->add_control(
         'projet_mouadh',
         [
           'label' => 'projet_mouadh',
           'type' => \Elementor\Controls_Manager::HEADING,
           'default' => 'Display projects'
         ]
       );
       $this->end_controls_section();
     }
     protected function render(){
      $args = array(
         'post_type' => 'projet_mouadh',
         'posts_per_page' => -1,
         'orderby' => 'date'
     );
     $projet_mouadh = new \WP_Query($args);
?>
         <!-- HTML DESIGN HERE -->
     <div class="projet_mouadh-container">
         <h2 class="projet_mouadh-container-tytul">projet_mouadh</h2>
             <?php while ($projet_mouadh->have_posts()) :  $projet_mouadh->the_post(); ?>
                 <div class="projet_mouadh">
                         <h1 class="projet_mouadh-tytul">
                             <a href="<?php echo get_permalink(); ?>">
                                 <?php echo get_the_title() ?>
                             </a>
                         </h1>
                     <?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
                 </div>
             <?php endwhile; ?>
     </div>
         <!-- HTML END DESIGN HERE -->
       <?php
     }
   }