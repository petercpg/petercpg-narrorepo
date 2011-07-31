<?php
    /**
     * @package Narro
     * @subpackage Templates
     *
     * Narro is an application that allows online software translation and maintenance.
     * Copyright (C) 2008-2011 Alexandru Szasz <alexxed@gmail.com>
     * http://code.google.com/p/narro/
     *
     * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public
     * License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any
     * later version.
     *
     * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the
     * implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
     * more details.
     *
     * You should have received a copy of the GNU General Public License along with this program; if not, write to the
     * Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
     */
?>
<?php if ($_CONTROL->objProject->ProjectDescription) {?>
<div class="section">
    <?php echo $_CONTROL->objProject->ProjectDescription ?>
</div>
<?php } ?>

<table width="1024">
<tr>
<td width="50%" valign="top" align="center" style="padding:1%">
<?php $_CONTROL->dtgTranslators->Render()?>
</td>
<td width="50%" valign="top" align="center" style="padding:1%">
<?php $_CONTROL->dtgReviewers->Render()?>
</td>
</tr>
</table>
