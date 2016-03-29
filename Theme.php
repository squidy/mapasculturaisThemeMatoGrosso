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

            'site: owner' => 'Secretaria de Estado da Cultura do Mato Grosso',

            'site: by the site owner' => 'pela Secretaria de Estado da Cultura do Mato Grosso',

            'home: title' => "Bem-vind@!",

            'home: abbreviation' => "Cultura MT",

            'home: colabore' => "Colabore com o Mapas Culturais",

            'home: welcome' => "Mapas Culturais é um software livre para mapeamento colaborativo
				 da cultura. O sistema é alimentado tanto pela Secretaria de
				 Cultura, que insere na plataforma informações sobre os 
				equipamentos culturais, programações oficiais, editais, e outros,
				 como pela população em geral, que se cadastra como agente de 
				cultura (individual ou coletivo) e pode divulgar suas próprias
				 programações. Esta ferramenta incorpora nos processos públicos
				 as lógicas do software livre, da colaboração, da
				 descentralização, do uso de dados abertos e da transparência.
				 Além disso, fortalece o Plano Nacional e Estadual de Cultura,
				 contribuindo para o seu cumprimento e acompanhamento de algumas
				 de suas metas. Participe!",

            'home: events' => "Veja a agenda de eventos culturais da sua cidade. Como usuário
				 cadastrado você pode incluir seus eventos no Mato Grosso Mapa
				 Cultural e divulgá-los gratuitamente.",

            'home: agents' => "Você pode colaborar com a gestão da cultura do seu Estado e cidade
				 com suas próprias informações preenchendo seu perfil de agente
				 cultural. Neste espaço estão registrados artistas, gestores e
				 produtores, uma rede de atores envolvidos na cena cultural 
				mato-grossense. Você pode cadastrar um ou mais agentes (grupos,
				 coletivos, bandas, empresas, instituições etc.), além de
				 associar ao seu perfil eventos e espaços culturais com
				 divulgação gratuita.",

            'home: spaces' => "Encontre aqui espaços e equipamentos culturais de Mato Grosso
				 incluídos na plataforma. Edificação, estrutura física ou área
				 pública ou privada utilizada para o desenvolvimento de
				 atividades culturais. Também bens imóveis e moveis que contenham
				 valor arquitetônico histórico.",

            'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos.
				 Neste espaço você encontra leis de fomento, mostras,
				 convocatórias e editais criados pela SEC-MT, além de diversas
				 iniciativas cadastradas pelos usuários da plataforma. 
				 Cadastre-se e divulgue seus projetos.",

            'home: home_devs' => 'Existem algumas maneiras de desenvolvedores interagirem com o
				 Mapas Culturais. A primeira é através da nossa 
				<a href="https://github.com/hacklabr/mapasculturais/blob/master/doc/api.md" target="_blank">API</a>. 
				Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. 
				Além disso, o Mapas Culturais é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, criado em parceria com o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a>, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/hacklabr/mapasculturais/" target="_blank">GitHub</a>.',

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
