<?php

// -----------------------------------------------------------------------
// This file is part of Igloo
//
// Copyright (C) 2003, 2006 Barnraiser
// http://www.barnraiser.org/
// info@barnraiser.org
//
// This program is free software; you can redistribute it and/or modify it
// under the terms of the GNU General Public License as published by the
// Free Software Foundation; either version 2, or (at your option) any
// later version.
//
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
// General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with program; see the file COPYING. If not, write to the Free
// Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA
// 02110-1301, USA.
// -----------------------------------------------------------------------




// TEMPLATE OUTPUT -----------------------------------------------------------------------


// general interface, url and template
$tpl->set('templatePath', $template_path);
$body->set('templatePath', $template_path);
$body->set('page_url', $_SERVER['REQUEST_URI']);
$body->set('page_name', basename($_SERVER['REQUEST_URI']));

// PROCESS TEMPLATE -----------------------------------------------------------------------
$template_file = $page_name[0] . ".tpl.php";

	$tpl->set('content', $body->fetch($template_file));
	echo $tpl->fetch('default.tpl.php');



// TIDY UP -----------------------------------------------------------------------
@mysql_close($db);

?>
