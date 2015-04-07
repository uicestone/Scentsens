(function() {
	
	tinymce.PluginManager.add('mfnsc', function(editor, url) {
		editor.addButton('mfnsc', {
			text : false,
			type : 'menubutton',
			icon : 'mfn-sc',
			classes: 'widget btn mfnsc',
			menu : [ {
				text : 'Column',
				menu : [ {
					text : '1/1',
					onclick : function() {
						editor.insertContent('[one]Insert your content here[/one]');
					}
				}, {
					text : '1/2',
					onclick : function() {
						editor.insertContent('[one_second]Insert your content here[/one_second]');
					}
				}, {
					text : '1/3',
					onclick : function() {
						editor.insertContent('[one_third]Insert your content here[/one_third]');
					}
				}, {
					text : '2/3',
					onclick : function() {
						editor.insertContent('[two_third]Insert your content here[/two_third]');
					}
				}, {
					text : '1/4',
					onclick : function() {
						editor.insertContent('[one_fourth]Insert your content here[/one_fourth]');
					}
				}, {
					text : '2/4',
					onclick : function() {
						editor.insertContent('[two_fourth]Insert your content here[/two_fourth]');
					}
				}, {
					text : '3/4',
					onclick : function() {
						editor.insertContent('[three_fourth]Insert your content here[/three_fourth]');
					}
				}, ]
			}, {
				text : 'Content',
				menu : [ {
					text : 'Blockquote',
					onclick : function() {
						editor.insertContent('[blockquote author="" link="" style="" target="_blank"]Insert your content here[/blockquote]');
					}
				}, {
					text : 'Button',
					onclick : function() {
						editor.insertContent('[button title="" icon="" link="" target="_blank" color="" filled="1"  large="0" class=""]');
					}
				}, {
					text : 'Code',
					onclick : function() {
						editor.insertContent('[code]Insert your content here[/code]');
					}
				}, {
					text : 'Divider',
					onclick : function() {
						editor.insertContent('[divider height="30" line="1"]');
					}
				}, {
					text : 'Dropcap',
					onclick : function() {
						editor.insertContent('[dropcap background="" color="" circle="0"]I[/dropcap]nsert your content here');
					}
				}, {
					text : 'Highlight',
					onclick : function() {
						editor.insertContent('[highlight background="" color=""]Insert your content here[/highlight]');
					}
				}, {
					text : 'Ico',
					onclick : function() {
						editor.insertContent('[ico type="icon-heart-line"]');
					}
				}, {
					text : 'Image',
					onclick : function() {
						editor.insertContent('[image src="" align="" caption="" link="" link_type="" target="" alt=""]');
					}
				}, {
					text : 'Table',
					onclick : function() {
						editor.insertContent('<table><thead><tr><th>Column 1 heading</th><th>Column 2 heading</th><th>Column 3 heading</th></tr></thead><tbody><tr><td>Row 1 col 1 content</td><td>Row 1 col 2 content</td><td>Row 1 col 3 content</td></tr><tr><td>Row 2 col 1 content</td><td>Row 2 col 2 content</td><td>Row 2 col 3 content</td></tr></tbody></table>');
					}
				}, {
					text : 'Tooltip',
					onclick : function() {
						editor.insertContent('[tooltip hint="Insert your hint here"]Insert your content here[/tooltip]');
					}
				}, {
					text : 'Video',
					onclick : function() {
						editor.insertContent('[video video="62954028" width="700" height="400"]');
					}
				}, ]
			}, {
				text : 'Builder',
				menu : [ {
					text : 'Article Box',
					onclick : function() {
						editor.insertContent('[article_box image="" title="" link="" target="_blank"]Insert your content here[/article_box]');
					}
				}, {
					text : 'Blog',
					onclick : function() {
						editor.insertContent('[blog count="2" category="" style="modern" pagination="0"]');
					}
				}, {
					text : 'Chart',
					onclick : function() {
						editor.insertContent('[chart percent="50" label="" position="left" title=""]Insert your content here[/chart]');
					}
				}, {
					text : 'Clients',
					onclick : function() {
						editor.insertContent('[clients in_row="6"]');
					}
				}, {
					text : 'Contact Box',
					onclick : function() {
						editor.insertContent('[contact_box title="" address="" telephone="" email="" www="" link_text="" link="" style="classic"]');
					}
				}, {
					text : 'Counter',
					onclick : function() {
						editor.insertContent('[counter icon="icon-heart-line" color="#222222" image="" number="44" title=""]');
					}
				}, {
					text : 'Fancy Heading',
					onclick : function() {
						editor.insertContent('[fancy_heading title="" icon="icon-heart-line" image="" style="color" class=""]Insert your content here[/fancy_heading]');
					}
				}, {
					text : 'Icon Box',
					onclick : function() {
						editor.insertContent('[icon_box title="" icon="icon-heart-line" icon_position="" link="" target="_blank"]Insert your content here[/icon_box]');
					}
				}, {
					text : 'Map',
					onclick : function() {
						editor.insertContent('[map lat="" lng="" height="200" zoom="13"]');
					}
				}, {
					text : 'Our Team',
					onclick : function() {
						editor.insertContent('[our_team image="" title="" subtitle="" email="" phone="" facebook="" twitter="" linkedin="" style="modern"]');
					}
				}, {
					text : 'Portfolio',
					onclick : function() {
						editor.insertContent('[portfolio count="2" category="" orderby="date" order="DESC" style="one" pagination="0"]');
					}
				}, {
					text : 'Pricing Item',
					onclick : function() {
						editor.insertContent('[pricing_item image="" title="" price="" currency="" period="" link_title="" link="" featured="" border="0"]<ul><li><strong>List</strong> item</li></ul>[/pricing_item]');
					}
				}, {
					text : 'Progress Bars',
					onclick : function() {
						editor.insertContent('[progress_bars title=""][bar title="Bar1" value="50"][/progress_bars]');
					}
				}, {
					text : 'Progress Box',
					onclick : function() {
						editor.insertContent('[progress_box value="" title=""]Insert your content here[/progress_box]');
					}
				}, {
					text : 'Testimonials',
					onclick : function() {
						editor.insertContent('[testimonials category="" orderby="menu_order" order="ASC" border="1"]');
					}
				}, {
					text : 'Video Box',
					onclick : function() {
						editor.insertContent('[video_box title="" video_m4v=""]Insert your content here[/video_box]');
					}
				}, ]
			} ]

		});

	});
	
})();