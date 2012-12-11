INSERT INTO `modules`
(`name`) VALUES
('iBot Library');

INSERT INTO `sections`
(`module_id`, `name`) VALUES
(1, 'Variables'),
(1, 'Functions'),
(1, 'Types');

INSERT INTO `items`
(`section_id`, `name`, `link`) VALUES
(1, 'cap', 'cap'),
(1, 'exp', 'exp'),
(1, 'hp', 'hp'),
(1, 'hppc', 'hppc'),
(1, 'axe', 'axe'),
(1, 'axepc', 'axepc'),
(1, 'club', 'club'),
(1, 'clubpc', 'clubpc'),
(2, 'attack', 'attack'),
(2, 'levitate', 'levitate'),
(2, 'moveitems', 'moveitems'),
(2, 'npcsay', 'npcsay'),
(2, 'time', 'time'),
(2, 'ischannel', 'ischannel'),
(2, 'windowcount', 'windowcount'),
(2, 'itemcost', 'itemcost'),
(2, 'itemid', 'itemid'),
(3, 'Creature', 'creature'),
(3, 'Item', 'item'),
(3, 'Message', 'message');

INSERT INTO `item_data`
(`item_id`, `html_desc`, `bbcd_desc`, `html_usage`, `bbcd_usage`) VALUES
(1, 'Your current capacity left', '', '<pre class="prettyprint linenums lang-lua">if cap < 10 then\n\t-- Less than 10 cap left\nend</pre>', ''),
(9, 'Attacks given creature', '', '<pre class="prettyprint linenums lang-lua">attack(followed) -- Attacks the creature you\'re following</pre>', ''),
(18, 'Holds information about a creature.', '', '<pre class="prettyprint linenums lang-lua">if (target.hppc < 10) then\n\tsay(\'exori con\')\nend</pre>', '');

INSERT INTO `parameters`
(`item_id`, `name`, `optional`, `type`, `html_desc`, `bbcd_desc`) VALUES
(9, 'creature', false, '{Creature}', 'Creature to attack', '');

INSERT INTO `return_values`
(`item_id`, `type`, `html_desc`, `bbcd_desc`) VALUES
(1, '{number}', 'Capacity left', '');


