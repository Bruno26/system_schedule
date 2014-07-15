<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="http://bell-1.myftp.org/system_schedule/">(CUC) <small>Colegio Universitario de Caracas</small></a>
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
'items'=>array(
//				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
//				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Aula', 'url'=>array('/aula/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Sección', 'url'=>array('/seccion/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Materia', 'url'=>array('/materia/admin'),'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Horario', 'url'=>array('/horario/view')),
				array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Cerrar Sesión ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->
