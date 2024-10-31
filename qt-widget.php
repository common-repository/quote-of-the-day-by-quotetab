<?php
/*  Copyright 2016 QuoteTab.com 

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/*
Plugin Name: Quote of the Day | QuoteTab
Plugin URI: https://www.quotetab.com/apps/wordpress-plugin
Description: Show a quote of the day in your site's sidebar. To install, click activate and then go to Appearance > Widgets and look for the 'Quote of the Day | QuoteTab'. Next, drag the widget to your sidebar.
Version: 1.8
Author: QuoteTab
Author URI: https://www.quotetab.com
*/

/**
 * Adds QuoteTab_Widget widget.
 */
class QuoteTab_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			__('QuoteTab Widget', 'text_domain'), // Name
			array( 'description' => __( 'Display a quote of the day in your blog.  Choose between 20 popular topics like: art, funny, love, inspirational..!', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$qtype = apply_filters( 'widget_title', $instance['qtype'] );

                $title_hash = array(
                     "art" => "Art | Quote of the Day",
                     "beauty" => "Beauty | Quote of the Day",
                     "friendship" => "Friendship | Quote of the Day",
                     "future" => "Future | Quote of the Day",
                     "happiness" => "Happiness | Quote of the Day",
                     "hope" => "Hope |Quote of the Day",
                     "inspirational" => "Inspirational | Quote of the Day",
                     "inspiring" => "Inspiring | Quote of the Day",
                     "leadership" => "Leadership | Quote of the Day",
                     "life" => "Life | Quote of the Day",
                     "love" => "Love | Quote of the Day",
                     "morning" => "Morning | Quote of the Day",
                     "motivational" => "Motivational | Quote of the Day",
                     "parenting" => "Parenting | Quote of the Day",
                     "positive" => "Positive | Quote of the Day",
                     "romantic" => "Romantic | Quote of the Day",
                     "success" => "Success | Quote of the Day",
                     "time" => "Time | Quote of the Day",
                     "travel" => "Travel | Quote of the Day",
                     "trust" => "Trust | Quote of the Day",
                     "truth" => "Truth | Quote of the Day"
                 );

		echo $args['before_widget'];
		if ( ! empty( $qtype) )
			echo $args['before_title'] . $title_hash[$qtype]. $args['after_title'];

		echo __( '<script type="text/javascript" src="https://qt-img.azureedge.net/module/quote-of-the-day/' . $qtype. '/loader.js"></script><small><i><a rel="nofollow" href="https://www.quotetab.com/quotes/about-' . $qtype. '?utm_source=wp_site&utm_medium=apps&utm_campaign=' . $qtype . '" target="_blank">more Quotes</a></i></small>', 'text_domain' );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'qtype' ] ) ) {
			$qtype = $instance[ 'qtype' ];
		}
		else {
			$qtype = "qotd";
		}
		?>
	         <p>
			<label for="<?php echo $this->get_field_id( 'qtype' ); ?>">What type of quotes would you like?</label> 
			<select id="<?php echo $this->get_field_id( 'qtype' ); ?>" name="<?php echo $this->get_field_name( 'qtype' ); ?>" class="widefat" style="width:100%;">
				<option value="art" <?php if ( 'art' == $qtype ) echo 'selected="selected"'; ?>>Art Quote of the Day</option>
				<option value="beauty" <?php if ( 'beauty' == $qtype ) echo 'selected="selected"'; ?>>Beauty Quote of the Day</option>
                <option value="friendship" <?php if ( 'friendship' == $qtype ) echo 'selected="selected"'; ?>>Friendship Quote of the Day</option>
                <option value="future" <?php if ( 'future' == $qtype ) echo 'selected="selected"'; ?>>Future Quote of the Day</option>
                <option value="happiness" <?php if ( 'happiness' == $qtype ) echo 'selected="selected"'; ?>>Happiness Quote of the Day</option>
                <option value="hope" <?php if ( 'hope' == $qtype ) echo 'selected="selected"'; ?>>Hope Quote of the Day</option>
                <option value="inspirational" <?php if ( 'inspirational' == $qtype ) echo 'selected="selected"'; ?>>Inspirational Quote of the Day</option>
                <option value="inspiring" <?php if ( 'inspiring' == $qtype ) echo 'selected="selected"'; ?>>Inspiring Quote of the Day</option>
                <option value="leadership" <?php if ( 'leadership' == $qtype ) echo 'selected="selected"'; ?>>Leadership Quote of the Day</option>
                <option value="life" <?php if ( 'life' == $qtype ) echo 'selected="selected"'; ?>>Life Quote of the Day</option>
                <option value="love" <?php if ( 'love' == $qtype ) echo 'selected="selected"'; ?>>Love Quote of the Day</option>
                <option value="morning" <?php if ( 'morning' == $qtype ) echo 'selected="selected"'; ?>>Morning Quote of the Day</option>
                <option value="motivational" <?php if ( 'motivational' == $qtype ) echo 'selected="selected"'; ?>>Motivational Quote of the Day</option>
                <option value="parenting" <?php if ( 'parenting' == $qtype ) echo 'selected="selected"'; ?>>Parenting Quote of the Day</option>
                <option value="positive" <?php if ( 'positive' == $qtype ) echo 'selected="selected"'; ?>>Positive Quote of the Day</option>
                <option value="romantic" <?php if ( 'romantic' == $qtype ) echo 'selected="selected"'; ?>>Romantic Quote of the Day</option>
                <option value="success" <?php if ( 'success' == $qtype ) echo 'selected="selected"'; ?>>Success Quote of the Day</option>
                <option value="time" <?php if ( 'time' == $qtype ) echo 'selected="selected"'; ?>>Time Quote of the Day</option>
                <option value="travel" <?php if ( 'travel' == $qtype ) echo 'selected="selected"'; ?>>Travel Quote of the Day</option>
                <option value="trust" <?php if ( 'trust' == $qtype ) echo 'selected="selected"'; ?>>Trust Quote of the Day</option>
                <option value="truth" <?php if ( 'truth' == $qtype ) echo 'selected="selected"'; ?>>Truth Quote of the Day</option>
			</select>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['qtype'] = ( ! empty( $new_instance['qtype'] ) ) ? strip_tags( $new_instance['qtype'] ) : '';

		return $instance;
	}

} // class QuoteTab_Widget

// register QuoteTab_Widget widget
function register_foo_widget() {
    register_widget( 'QuoteTab_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );
?>
