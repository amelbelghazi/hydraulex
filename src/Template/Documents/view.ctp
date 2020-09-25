<section class="content-header">
  <h1>
    <?php echo __('Document'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Retour'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h3 class="box-title"><?php echo __('Information'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt><?= __('Libelle') ?></dt>
                        <dd>
                             <?= h($document->libelle) ?>
                        </dd>             
                    <dt><?= __('Date d\'ajout') ?></dt>
                        <dd>
                            <?= h($document->created) ?>
                        </dd>                                                                          
                    <dt><?= __('Tags') ?></dt>
                        <dd>
                           <?php  foreach($tags as $tag){?>
                      
                      <?= h($tag->libelle.' . ') ?>
                    <?php  }//die();?>
                        </dd>
                         <?php if (empty($document->document)) {
                                    echo ' <dt>'.__('Telecharger le Document').'</dt>
                        <dd> Aucun fichier pour Télécharger</dd>';
                            }else{
                                foreach($tags as $tag){
                                    
                                    if ($tag['libelle']=="Avances") {?>
                                        <dt><?= __('Telecharger le Document') ?></dt>
                                        <dd>

                                       <?php echo $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/files/'.$tag['libelle'].'/' . $document->document,array('class'=>'text-danger','style'=>'font-size:15pt;padding:0 5px;','escape'=>false));?>
                                       </dd>

                                    <?php } else {
                                        if ($tag['libelle']=="Avenants") {?>
                                        <dt><?= __('Telecharger le Document') ?></dt>
                                        <dd>

                                       <?php echo $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/files/'.$tag['libelle'].'/' . $document->document,array('class'=>'text-danger','style'=>'font-size:15pt;padding:0 5px;','escape'=>false));?>
                                       </dd>

                                    <?php
                                        } else {
                                            if ($tag['libelle']=="Cautions") {
                                               ?>
                                        <dt><?= __('Telecharger le Document') ?></dt>
                                        <dd>

                                       <?php echo $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/files/'.$tag['libelle'].'/' . $document->document,array('class'=>'text-danger','style'=>'font-size:15pt;padding:0 5px;','escape'=>false));?>
                                       </dd>

                                    <?php
                                            } else {
                                                if ($tag['libelle']=="Devis") {
                                                    ?>
                                        <dt><?= __('Telecharger le Document') ?></dt>
                                        <dd>

                                       <?php echo $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/files/'.$tag['libelle'].'/' . $document->document,array('class'=>'text-danger','style'=>'font-size:15pt;padding:0 5px;','escape'=>false));?>
                                       </dd>

                                    <?php
                                                } else {
                                                    if ($tag['libelle']=="Commissions") {
                                                    ?>
                                        <dt><?= __('Telecharger le Document') ?></dt>
                                        <dd>

                                       <?php echo $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/files/'.$tag['libelle'].'/' . $document->document,array('class'=>'text-danger','style'=>'font-size:15pt;padding:0 5px;','escape'=>false));?>
                                       </dd>

                                    <?php
                                                        } else {
                                                            if ($tag['libelle']=="FraisProjets") {
                                                                    ?>
                                        <dt><?= __('Telecharger le Document') ?></dt>
                                        <dd>

                                       <?php echo $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/files/'.$tag['libelle'].'/' . $document->document,array('class'=>'text-danger','style'=>'font-size:15pt;padding:0 5px;','escape'=>false));?>
                                       </dd>

                                    <?php
                                                                } else { 
                                                                    if ($tag['libelle']=="Marches") {
                                                                    ?>
                                        <dt><?= __('Telecharger le Document') ?></dt>
                                        <dd>

                                       <?php echo $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/files/'.$tag['libelle'].'/' . $document->document,array('class'=>'text-danger','style'=>'font-size:15pt;padding:0 5px;','escape'=>false));?>
                                       </dd>

                                    <?php
                                                                        } else {
                                                                            if ($tag['libelle']=="ODS") {
                                                                                    ?>
                                        <dt><?= __('Telecharger le Document') ?></dt>
                                        <dd>

                                       <?php echo $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/files/'.$tag['libelle'].'/' . $document->document,array('class'=>'text-danger','style'=>'font-size:15pt;padding:0 5px;','escape'=>false));?>
                                       </dd>

                                    <?php
                                                                            } else {
                                                                                    if ($tag['libelle']=="Pvs") {
                                                                                   ?>
                                        <dt><?= __('Telecharger le Document') ?></dt>
                                        <dd>

                                       <?php echo $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/files/'.$tag['libelle'].'/' . $document->document,array('class'=>'text-danger','style'=>'font-size:15pt;padding:0 5px;','escape'=>false));?>
                                       </dd>

                                    <?php
                                                                                    } else {
                                                                                    ?>
                                        <dt><?= __('Telecharger le Document') ?></dt>
                                        <dd>

                                       <?php echo $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/img/Documents' . $document->document,array('class'=>'text-danger','style'=>'font-size:15pt;padding:0 5px;','escape'=>false));?>
                                       </dd>

                                    <?php
                                                                                    }
                                                                            }
                                                                        }
                                                                }
                                                        }
                                                }
                                                
                                            }
                                            
                                        }
                                        

                                    }
                                }
                               
                            }
                            ?>

                           
                        </dd>

                          
                </dl>
                 <div class="col-md-12"><?php if(!empty($document->document)){ ?>
                                 
                                    <?php if (preg_match("#jpg#", $document->document) || preg_match("#jpeg#", $document->document) || preg_match("#png#", $document->document)){ ?>
                                      
                                        <?php echo $this->Html->image('Documents/'.$document->document, array('class'=>'img-responsive')); ?>
                                    <?php }else{?>
                                        <?php if (preg_match("#pdf#", $document->document)){ ?>
                                            <IFRAME src="http://localhost/hydraulex/img/Documents/<?= $document->document; ?>#zoom=80" width="100%" height="1005"></IFRAME>
                                        <?php }else{
                                            echo $document->libelle;
                                        } ?>
                                    <?php } ?>
                                <?php }?>
                            </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

 <!--   <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Pieces Identites']) ?></h3>
                </div>-->
                <!-- /.box-header -->
              <!--  <div class="box-body table-responsive no-padding">

                <?php if (!empty($document->pieces_identites)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Numero
                                    </th>
                                        
                                                                    
                                    <th>
                                    Type Piece Identite Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datepiece
                                    </th>
                                        
                                                                    
                                    <th>
                                    Document Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($document->pieces_identites as $piecesIdentites): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($piecesIdentites->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($piecesIdentites->numero) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($piecesIdentites->type_piece_identite_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($piecesIdentites->datepiece) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($piecesIdentites->document_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($piecesIdentites->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'PiecesIdentites', 'action' => 'view', $piecesIdentites->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'PiecesIdentites', 'action' => 'edit', $piecesIdentites->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PiecesIdentites', 'action' => 'delete', $piecesIdentites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $piecesIdentites->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>-->
                <!-- /.box-body -->
            <!--</div>-->
            <!-- /.box -->
        <!--</div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Tags']) ?></h3>
                </div>-->
                <!-- /.box-header -->
               <!-- <div class="box-body table-responsive no-padding">

                <?php if (!empty($document->tags)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Libelle
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($document->tags as $tags): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($tags->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($tags->libelle) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($tags->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div> -->
                <!-- /.box-body -->
            <!--</div> -->
            <!-- /.box -->
       <!-- </div>
    </div>-->
</section>
