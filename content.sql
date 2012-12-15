INSERT INTO `modules`
(`name`,			`link`) VALUES
('iBot Library',	'ibot');


INSERT INTO `items`
(`module_id`,	`type`,			`name`,			`link`) VALUES

(1,				'Variable',		'cap',			'cap'),
(1,				'Variable',		'exp',			'exp'),
(1,				'Variable',		'hp',			'hp'),
(1,				'Variable',		'hppc',			'hppc'),
(1,				'Variable',		'axe',			'axe'),
(1,				'Variable',		'axepc',		'axepc'),
(1,				'Variable',		'club',			'club'),
(1,				'Variable',		'clubpc',		'clubpc'),
(1,				'Function',		'attack',		'attack'),
(1,				'Function',		'levitate',		'levitate'),
(1,				'Function',		'moveitems',	'moveitems'),
(1,				'Function',		'npcsay',		'npcsay'),
(1,				'Function',		'time',			'time'),
(1,				'Function',		'ischannel',	'ischannel'),
(1,				'Function',		'windowcount',	'windowcount'),
(1,				'Function',		'itemcost',		'itemcost'),
(1,				'Function',		'itemid',		'itemid'),
(1,				'Type',			'Creature',		'creature'),
(1,				'Type',			'Item',			'item'),
(1,				'Type',			'Message',		'message');

INSERT INTO `headings`
(`item_id`,		`order`,	`name`,			`html_content`) VALUES

(1,				1, 			'Description',	'Your character\'s current left capacity.'),
(2,				1, 			'Description',	'Your character\'s current experience points.'),
(3,				1, 			'Description',	'Your character\'s current health points.'),
(4,				1, 			'Description',	'Your character\'s current health point percentage.'),
(5,				1, 			'Description',	'Your character\'s current axe skill.'),
(6,				1, 			'Description',	'Your character\'s current axe skill\'s pecentage towards the next level.'),
(7,				1, 			'Description',	'Your character\'s current club skill.'),
(8,				1, 			'Description',	'Your character\'s current club skill\'s pecentage towards the next level.'),
(9,				1,			'Description',	'Attacks a given <a href="/docs/type/creature">creature</a>.'),
(9,				2,			'Usage',		'<pre class="prettyprint linenums lang-lua">attack(creature)</pre>'),
(14,			1,			'Description',	'Checks whether given conversation channel is open.'),
(14,			2,			'Usage',		'<pre class="prettyprint linenums lang-lua">ischannel(channel)</pre>');


INSERT INTO `sub_headings`
(`heading_id`,	`order`,	`name`,			`html_content`) VALUES

(1,				1,			'Return Type',	'<span class="code">{number}</span>'),
(2,				1,			'Return Type',	'<span class="code">{number}</span>'),
(3,				1,			'Return Type',	'<span class="code">{number}</span>'),
(4,				1,			'Return Type',	'<span class="code">{number}</span>'),
(5,				1,			'Return Type',	'<span class="code">{number}</span>'),
(6,				1,			'Return Type',	'<span class="code">{number}</span>'),
(7,				1,			'Return Type',	'<span class="code">{number}</span>'),
(8,				1,			'Return Type',	'<span class="code">{number}</span>'),
(10,			1,			'Parameters',	'<ul><li><span class="code">creature - {Creature} - <a href="/docs/type/creature">Creature</a> to be attacked.</span></li></ul>'),
(12,			1,			'Parameters',	'<ul><li><span class="code">channel - {string} - Channel to be checked.</span></li></ul>'),
(12,			2,			'Returns',		'<span class="code">{boolean} - Wheter the checked channel is open.</span>');
