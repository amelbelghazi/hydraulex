<?php
use Cake\Core\Configure;

$file =  'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';
if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<ul class="sidebar-menu">
    <li class="header">MENU</li>
    <li>
            <?= $this->Html->link('<i class="fa fa-dashboard"></i> <span>'.__('Page d\'accueil').'</span><span class="pull-right-container"></span>', ['controller'=>'Pages', 'action' => 'display', 'home'], ['escape' => false]) ?>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-folder"></i>
            <span>Projets</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Appel d\'offre').'', ['controller'=>'Affaires', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Commissions').'', ['controller'=>'Commissions', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Soumissions').'', ['controller'=>'Soumissions', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Attributions').'', ['controller'=>'Attributions', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Frais').'', ['controller'=>'FraisProjets', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Marchés').'', ['controller'=>'Marches', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Devis').'', ['controller'=>'Devis', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' ODS').'', ['controller'=>'Odss', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Avenants').'', ['controller'=>'Avenants', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Cautions').'', ['controller'=>'Cautions', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Avances').'', ['controller'=>'Avances', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Attachements des travaux').'', ['controller'=>'AttachementsTravaux', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Situations').'', ['controller'=>'Situations', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' PV').'', ['controller'=>'Pvs', 'action' => 'index'], ['escape' => false]) ?>
            </li>
        </ul>
    </li>
    <li>
        <?= $this->Html->link('<i class="fa fa-money"></i> <span>'.__(' Soutraitance').'</span>', ['controller'=>'soustraitants', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i class="fa fa-money"></i> <span>'.__(' Dépenses').'</span>', ['controller'=>'Depenses', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-cart-plus"></i>
            <span>Approvisionnement</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Achats').'', ['controller'=>'Achats', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Stock').'', ['controller'=>'Produits', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Dépots').'', ['controller'=>'Depots', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Commandes').'', ['controller'=>'Bons_Commandes', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Bons de reception').'', ['controller'=>'Bons_Receptions', 'action' => 'index'], ['escape' => false]) ?>
            </li>
        </ul>
    </li>
    <li>
        <?= $this->Html->link('<i class="fa fa-money"></i> <span>'.__(' Locations').'</span>', ['controller'=>'Locations', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i class="fa fa-bullhorn"></i> <span>'.__(' Chantiers').'</span>', ['controller'=>'Chantiers', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i class="fa fa-money"></i> <span>'.__(' Parcs').'</span>', ['controller'=>'Parcs', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i class="fa fa-calendar"></i> <span>'.__(' Agenda').'</span>', ['controller'=>'Pages', 'action' => 'display', 'calendar'], ['escape' => false]) ?>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-truck"></i> <span>Ressources</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Création').'', ['controller'=>'Ressources', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Affectations').'', ['controller'=>'Affectations', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Entretiens').'', ['controller'=>'Entretiens-Ressources', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Pannes').'', ['controller'=>'Pannes', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Réparations').'', ['controller'=>'Reparations', 'action' => 'index'], ['escape' => false]) ?>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-male"></i> <span>Personnels</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Employés').'', ['controller'=>'Personnels', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Equipes').'', ['controller'=>'Equipes', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Contrats').'', ['controller'=>'ContratsPersonnels', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Fonctions').'', ['controller'=>'Fonctions', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Paie').'', ['controller'=>'Salaires', 'action' => 'index'], ['escape' => false]) ?>
            </li>
        </ul>
    </li>
    <li>
        <?= $this->Html->link('<i class="fa fa-envelope"></i> <span>'.__(' Mails').'</span>', ['controller'=>'Emails', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i class="fa fa-file"></i> <span>'.__(' Planning').'</span>', ['controller'=>'Tasks', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i class="fa fa-file-text-o "></i> <span>'.__(' Documents').'</span>', ['controller'=>'Documents', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-comments-o"></i> <span>Courriers</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>'.__('Départ').'</span>', ['controller'=>'Correspondances_Sortantes', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>'.__('Arrivée').'</span>', ['controller'=>'Correspondances_Entrantes', 'action' => 'index'], ['escape' => false]) ?>
            </li>
        </ul>
    </li>
    <li>
    <?= $this->Html->link('<i class="fa fa-users"></i><span>'.__('Utilisateurs').'</span>', ['controller'=>'Users', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-building"></i> <span>Carnet d'adresses</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>'.__('Fournisseurs').'</span>', ['controller'=>'Fournisseurs', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>'.__('Sous-traitants').'</span>', ['controller'=>'Soustraitants', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>'.__('Maitres d\'ouvrages').'</span>', ['controller'=>'MaitresOuvrages', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>'.__('Réparateurs').'</span>', ['controller'=>'Reparateurs', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>'.__('Proprietaires').'</span>', ['controller'=>'Proprietaires', 'action' => 'index'], ['escape' => false]) ?>
            </li>
        </ul>
    </li>
    <li>
        <?= $this->Html->link('<i class="fa fa-gift"></i><span>'.__('Cadeaux').'</span>', ['controller'=>'Gifts', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-gears"></i> <span>Paramètres</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <?= $this->Html->link('<i class="fa fa-gears"></i><span>'.__('Sociétés').'</span>', ['controller'=>'Societes', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
                <?= $this->Html->link('<i class="fa fa-gift"></i><span>'.__('Unités').'</span>', ['controller'=>'Unites', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <li>
            <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>'.__('Marques').'</span>', ['controller'=>'Marques', 'action' => 'index'], ['escape' => false]) ?>
            </li>
        </ul>
    </li>
</ul>
<?php } ?>
