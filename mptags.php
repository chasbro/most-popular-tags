<?php

/*
Plugin name: Most Popular Tags
Plugin URI: http://www.maxpagels.com/projects/mptags
Description: A plugin that enables a configurable "Most Popular Tags" widget.
Version: 0.6
Author: Max Pagels
Author URI: http://www.maxpagels.com

    Copyright 2009  Max Pagels  (email : max.pagels1@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function init_most_popular_tags() {

	function most_popular_tags($args) {
		
		extract($args);
		$options = get_option('most_popular_tags');
		$title = $options['title'];
		$tagcount = $options['tag_count'];
		$smallest = $options['smallest'];
		$largest = $options['largest'];
		$unit = $options['unit'];
		$format = $options['format'];
		$orderby = $options['orderby'];
		$order = $options['order'];

		echo $before_widget . $before_title . $title . $after_title;
		wp_tag_cloud("smallest=$smallest&largest=$largest&number=$tagcount&orderby=$orderby&order=$order&unit=$unit&format=$format");
		echo $after_widget;
		
	}
	
	function most_popular_tags_control() {
	
		$options = get_option('most_popular_tags');
		
		if(!is_array($options)) {
			$options = array('title' => 'Most Popular Tags', 
			                 'tag_count' => 10, 
			                 'smallest' => 12, 
			                 'largest' => 12, 
			                 'unit' => 'px', 
			                 'format' => 'flat',
			                 'orderby' => 'count',
			                 'order' => 'DESC');
		}
		
		if($_POST['mptags-submit']) {
			$title = strip_tags(stripslashes($_POST['mptags-title']));
			if(empty($title)) {
				$title = 'Most Popular Tags';
			}
			$options['title'] = $title;
			$options['tag_count'] = intval(strip_tags(stripslashes($_POST['mptags-tag-count'])));
			$options['smallest'] = intval(strip_tags(stripslashes($_POST['mptags-smallest'])));
			$options['largest'] = intval(strip_tags(stripslashes($_POST['mptags-largest'])));
			$options['unit'] = strip_tags(stripslashes($_POST['mptags-unit']));
			$options['format'] = strip_tags(stripslashes($_POST['mptags-format']));
			$options['orderby'] = strip_tags(stripslashes($_POST['mptags-orderby']));
			$options['order'] = strip_tags(stripslashes($_POST['mptags-order']));
			update_option('most_popular_tags', $options);
		}
		
		$selected = "selected";
		
		if($options['unit'] == "px")
			$s1 = $selected;
		elseif($options['unit'] == "pt")
			$s2 = $selected;
		elseif($options['unit'] == "%")
			$s3 = $selected;
		else
			$s4 = $selected;
			
		if($options['format'] == "flat")
			$f1 = $selected;
		else
			$f2 = $selected;
			
		if($options['orderby'] == "count")
			$ob1 = $selected;
		else
			$ob2 = $selected;

		if($options['order'] == "DESC")
			$o1 = $selected;
		else
			$o2 = $selected;
		
		echo'<p><label for="mptags-title">Widget Title: </label>
	    	<input type="text" id="mptags-title" name="mptags-title" value="' . $options['title'] . '"/></p>
			<p><label for="mptags-tag-count">Number of tags to show: </label>
	    	<input type="text" id="mptags-tag-count" name="mptags-tag-count" value="' . $options['tag_count'] . '"/></p>
			<p><label for="mptags-smallest">Smallest font size: </label>
	    	<input type="text" id="mptags-smallest" name="mptags-smallest" value="' . $options['smallest'] . '"/></p>
			<p><label for="mptags-largest">Largest font size: </label>
	    	<input type="text" id="mptags-largest" name="mptags-largest" value="' . $options['largest'] . '"/></p>
			<p><label for="mptags-unit">Unit:</label>
			<select id="mptags-unit" name="mptags-unit">
				<option value="px" ' . $s1 . '>px</option>
				<option value="pt" ' . $s2 . '>pt</option>
				<option value="%" ' . $s3 . '>%</option>
				<option value="em" ' . $s4 . '>em</option>
			</select></p>
			<p><label for="mptags-format">Format:</label>
			<select id="mptags-format" name="mptags-format">
				<option value="flat" ' . $f1 . '>Flat</option>
				<option value="list" ' . $f2 . '>List</option>
			</select></p>
			<p><label for="mptags-format">Order by:</label>
			<select id="mptags-order" name="mptags-orderby">
				<option value="count" ' . $ob1 . '>Tag Count</option>
				<option value="name" ' . $ob2 . '>Tag Name</option>
			</select></p>
			<p><label for="mptags-format">Order:</label>
			<select id="mptags-order" name="mptags-order">
				<option value="ASC" ' . $o2 . '>Ascending</option>
				<option value="DESC" ' . $o1 . '>Descending</option>
			</select></p>
			<input type="hidden" id="mptags-submit" name="mptags-submit" value="1" />';
			
	}

	register_sidebar_widget("Most Popular Tags", "most_popular_tags");
	register_widget_control("Most Popular Tags", "most_popular_tags_control");

}

add_action('init', 'init_most_popular_tags');

?>