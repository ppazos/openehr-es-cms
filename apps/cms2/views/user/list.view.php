<?php

$m = Model::getInstance();

$users = $m->get('users');

global $_base_dir;

YuppLoader::load('apps.cms2.helpers', 'CmsHelpers');

?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php echo h('css', array('app'=>'cms2', 'name'=>'main')); ?>
    <?php echo h('css', array('app'=>'cms2', 'name'=>'backend')); ?>
    <style type="text/css">
      th {
         background: #fff url(<?php echo $_base_dir; ?>/images/shadow.jpg) bottom repeat-x;
      }
      #actions {
          background: #fff url(<?php echo $_base_dir; ?>/images/shadow.jpg) bottom repeat-x;
      }
      .order_asc {
         background-image: url(<?php echo $_base_dir; ?>/images/order_asc.gif);
      }
      .order_desc {
         background-image: url(<?php echo $_base_dir; ?>/images/order_desc.gif);
      }
    </style>
     <?php echo h('js', array('app'=>'cms2', 'name'=>'jquery/jquery-1.7.1.min')); ?>
     <?php echo h('js', array('app'=>'cms2', 'name'=>'superfish-1.4.8/js/superfish')); ?>
     <script type="text/javascript">
      $(document).ready( function() {
        
        // Menu desplegable para la topbar:
        $('#topbar > ul').superfish({ 
            delay:       600,                             // one second delay on mouseout 
            animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
            speed:       'fast',                          // faster animation speed 
            autoArrows:  false                            // disable generation of arrow mark-up 
        });
      });
     </script>
   </head>
   <body>
      <?php CmsHelpers::topbar(); ?>
      
      <div id="body">
      
      <h1>Gestionar usuarios</h1>
      
      <?php if ($m->flash('message')) { ?>
        <div class="flash"><?php echo $m->flash('message'); ?></div>
      <?php } ?>

      <table>
        <tr><!--FIXME> ver de agarrar el parametro por el que ordeno ahora del contexto o los params (esta dentro de Model::getInstance()) -->
            <th>#</th>
            <th><?php echo h('orderBy', array('action'=>'list','body'=>'nombre','attr'=>'name')); ?></th>
            <th><?php echo h('orderBy', array('action'=>'list','body'=>'email','attr'=>'email')); ?></th>
            <th><?php echo h('orderBy', array('action'=>'list','body'=>'fecha de nacimiento','attr'=>'birthdate')); ?></th>
            <th><?php echo h('orderBy', array('action'=>'list','body'=>'tipo','attr'=>'usertype')); ?></th>
            <th><?php echo h('orderBy', array('action'=>'list','body'=>'institucion','attr'=>'company')); ?></th>
            <th><?php echo h('orderBy', array('action'=>'list','body'=>'cargo','attr'=>'position')); ?></th>
            <th><?php echo h('orderBy', array('action'=>'list','body'=>'deleted','attr'=>'deleted')); ?></th>
            <th>acciones</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ( $users as $user ): ?>
          <tr>
            <td><?php echo $i; $i++; ?></td>
            <td><?php echo $user->getName(); ?></td>
            <td><?php echo $user->getEmail(); ?></td>
            <td><?php echo $user->getBirthdate(); ?></td>
            <td><?php echo $user->getUsertype(); ?></td>
            <td><?php echo $user->getCompany(); ?></td>
            <td><?php echo $user->getPosition(); ?></td>
            <td><?php echo $user->getDeleted(); ?></td>
            <td>
              <?php echo h("link", array("action"=>"show", "id"=>$user->getId(), "body"=>"Detalles" ) ); ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      
      <?php echo h('pager', array('offset'=>$m->get('offset'), 'max'=>$m->get('max'), 'count'=>$m->get('count'))); ?>
    </div>
  </body>
</html>