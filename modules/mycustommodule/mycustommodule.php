<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class MyCustomModule extends Module
{
    public function __construct()
    {
        $this->name = 'mycustommodule';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Twoje Imię';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Mój własny moduł');
        $this->description = $this->l('Opis Twojego modułu.');
    }

    public function install()
    {
        return parent::install() && $this->registerHook('displayHome');
    }

    public function hookDisplayHome($params)
    {
        $cacheId = 'mycustommodule|home';
        if (!$this->isCached('views/templates/hook/displayHome.tpl', $this->getCacheId($cacheId))) {
            $this->context->smarty->assign([
                'my_var' => 'Wartość do wyświetlenia'
            ]);
        }
        return $this->display(__FILE__, 'views/templates/hook/displayHome.tpl', $this->getCacheId($cacheId));
    }

    public function clearMyCache()
    {
        $cacheId = 'mycustommodule|home';
        $this->_clearCache('views/templates/hook/displayHome.tpl', $this->getCacheId($cacheId));
    }
} 