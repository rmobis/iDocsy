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

(1,				1, 			'Description',	'<p>Your character\'s current left capacity.</p>'),
(2,				1, 			'Description',	'<p>Your character\'s current experience points.</p>'),
(3,				1, 			'Description',	'<p>Your character\'s current health points.</p>'),
(4,				1, 			'Description',	'<p>Your character\'s current health point percentage.</p>'),
(5,				1, 			'Description',	'<p>Your character\'s current axe skill.</p>'),
(6,				1, 			'Description',	'<p>Your character\'s current axe skill\'s pecentage towards the next level.</p>'),
(7,				1, 			'Description',	'<p>Your character\'s current club skill.</p>'),
(8,				1, 			'Description',	'<p>Your character\'s current club skill\'s pecentage towards the next level.</p>'),
(9,				1,			'Description',	'<p>Attacks a given <a href="/ibot/creature">creature</a>.</p>'),
(9,				2,			'Usage',		'<pre class="prettyprint linenums lang-lua">attack(creature)</pre>'),
(14,			1,			'Description',	'<p>Checks whether given conversation channel is open.</p>'),
(14,			2,			'Usage',		'<pre class="prettyprint linenums lang-lua">ischannel(channel)</pre>');


INSERT INTO `sub_headings`
(`heading_id`,	`order`,	`name`,			`html_content`) VALUES

(1,				1,			'Return Type',	'<p><span class="code">{number}</span></p>'),
(2,				1,			'Return Type',	'<p><span class="code">{number}</span></p>'),
(3,				1,			'Return Type',	'<p><span class="code">{number}</span></p>'),
(4,				1,			'Return Type',	'<p><span class="code">{number}</span></p>'),
(5,				1,			'Return Type',	'<p><span class="code">{number}</span></p>'),
(6,				1,			'Return Type',	'<p><span class="code">{number}</span></p>'),
(7,				1,			'Return Type',	'<p><span class="code">{number}</span></p>'),
(8,				1,			'Return Type',	'<p><span class="code">{number}</span></p>'),
(10,			1,			'Parameters',	'<ul><li><span class="code">creature - {Creature} - <a href="/ibot/creature">Creature</a> to be attacked.</span></li></ul>'),
(12,			1,			'Parameters',	'<ul><li><span class="code">channel - {string} - Channel to be checked.</span></li></ul>'),
(12,			2,			'Returns',		'<span class="code">{boolean} - Wheter the checked channel is open.</span>');

INSERT INTO `module_headings`
(`module_id`,	`order`,	`name`,			`html_content`) VALUES

(1,				1, 			'Description',	'<p>This module holds all content that comes packed with iBot, without any additional library.<br /><br /><strong>Note:</strong> It does not contain any information about standard LUA functions/variables.</p>');

INSERT INTO `users`
(`email`,				`password`) VALUES

('admin@gmail.com',		'$2a$08$lVjH5oFqVgDqHPPZC06X0eE4ZnoS.4VCkM4wV6XVW18g2pfNClNQO'), -- Password: admin
('test@hotmail.com',	'$2a$08$R7ORiYWlRq9my3uU635Vgeazh85/IAJ9kSjO2Cn.CjI8hdmmbj/Uy'); -- Password: test
