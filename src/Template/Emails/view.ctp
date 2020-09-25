<section class="content-header">
  <h1>
    <?php echo __('Email'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Back'), ['action' => 'index'], ['escape' => false])?>
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
                                                                                                                <dt><?= __('Destinataire') ?></dt>
                                        <dd>
                                            <?= h($email->destinataire) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Expediteur') ?></dt>
                                        <dd>
                                            <?= h($email->expediteur) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Objet') ?></dt>
                                        <dd>
                                            <?= h($email->objet) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Message') ?></dt>
                                        <dd>
                                            <?= h($email->message) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                            
                                                                                                                                                                                                
                                            
                                    </dl>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Attachements']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($email->attachements)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Email Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Document Id
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($email->attachements as $attachements): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($attachements->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($attachements->email_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($attachements->document_id) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Attachements', 'action' => 'view', $attachements->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attachements', 'action' => 'edit', $attachements->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attachements', 'action' => 'delete', $attachements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachements->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
