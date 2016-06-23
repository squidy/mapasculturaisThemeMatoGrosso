<?php
namespace mapasculturaisThemeMatoGrosso;
use MapasCulturais\Themes\BaseV1;
use MapasCulturais\App;

class Theme extends BaseV1\Theme{

    protected static function _getTexts(){
        $app = App::i();
        $self = $app->view;
        $url_search_agents = $self->searchAgentsUrl;
        $url_search_spaces = $self->searchSpacesUrl;
        $url_search_events = $self->searchEventsUrl;
        $url_search_projects = $self->searchProjectsUrl;

        return [
            'site: name' => App::i()->config['app.siteName'],
            'site: description' => App::i()->config['app.siteDescription'],
            'site: in the region' => 'na região',
            'site: of the region' => 'da região',
            'site: owner' => 'Secretaria',
            'site: by the site owner' => 'pela Secretaria',

            'home: title' => " <br> Bem-vind@!",
            'home: abbreviation' => "MT",
            'home: colabore' => "Colabore com o Mapas MT",
            'home: welcome' => "<div style='width:50%; float:left'>Mapas MT é um software livre para mapeamento colaborativo. O sistema é alimentado tanto pelas Secretarias de Estados e Municípios os quais inserem na plataforma informações sobre os equipamentos culturais, turísticos, programações oficiais, editais, e outros, como pela população em geral, que se cadastra como agente (individual ou coletivo) e pode divulgar suas próprias programações. Esta ferramenta incorpora nos processos públicos as lógicas do software livre, da colaboração, da descentralização, do uso de dados abertos e da transparência. Além disso, fortalece o Plano Nacional e Estadual de Cultura, contribuindo para o seu cumprimento e acompanhamento de algumas de suas metas. Participe!
.</div><div style='width:50%; float:left; margin-bottom:25px;'><iframe width='100%' height='250' src='https://www.youtube.com/embed/videoseries?list=PLJxEUm52CjMSH_byKXd14nlTdR0ZB2KeF' frameborder='0' allowfullscreen></iframe></div>",
            'home: events' => "Veja a agenda de eventos da sua cidade. Como usuário cadastrado você pode incluir seus eventos no Mato Grosso Mapas MT e divulgá-los gratuitamente.",
            'home: agents' => "Você pode colaborar com a gestão do seu Estado e Municípios com suas próprias informações preenchendo seu perfil de agente. Neste espaço estão registrados artistas, gestores e produtores, uma rede de atores envolvidos na cena cultural mato-grossense. Você pode cadastrar um ou mais agentes (grupos, coletivos, bandas, empresas, instituições etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
            'home: spaces' => "Encontre aqui espaços e equipamentos culturais e turísticos de Mato Grosso incluídos na plataforma. Edificação, estrutura física ou área pública ou privada utilizada para o desenvolvimento de atividades. Também bens imóveis e moveis que contenham valor arquitetônico histórico.",
            'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos. Neste espaço você encontra leis de fomento, mostras, convocatórias e editais criados pelas Secretarias de Estado e Municípios, além de diversas iniciativas cadastradas pelos usuários da plataforma. Cadastre-se e divulgue seus projetos.",
            'home: home_devs' => 'Existem algumas maneiras de desenvolvedores interagirem com o Mapas Culturais. A primeira é através da nossa <a href="https://github.com/hacklabr/mapasculturais/blob/master/doc/api.md" target="_blank">API</a>. Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. Além disso, o Cultura MT é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, criado em parceria com o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a>, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/hacklabr/mapasculturais/" target="_blank">GitHub</a>.',

            'search: verified results' => 'Resultados Verificados',
            'search: verified' => "Verificados"
        ];
    }

    static function getThemeFolder() {
        return __DIR__;
    }

    function _init() {
        parent::_init();
        $app = App::i();
        $app->hook('view.render(<<*>>):before', function() use($app) {
            $this->_publishAssets();
        });
    }

    protected function _publishAssets() {
        $this->jsObject['assets']['logo-instituicao'] = $this->asset('img/mapasculturais_logo-instituicao.svg', false);
    }

}
