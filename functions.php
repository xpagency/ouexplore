<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    function getPillars( $type ){
        stream_context_set_default(array(
            'ssl'                => array(
            'peer_name'          => 'generic-server',
            'verify_peer'        => FALSE,
            'verify_peer_name'   => FALSE,
            'allow_self_signed'  => TRUE
        )));
        
        $url  = 'http://explore.php7dev.lib.ou.edu/restep/taxonomy_term/';
        $json = file_get_contents( $url );
        $data = json_decode( $json, TRUE);
        $data = array_reverse( $data );
        
        // echo '<pre>';
        // print_r( $data );
        // echo '<pre>';
        
        foreach( $data as $key => $value){
            if( $value['vid'] == 2){
                
                stream_context_set_default(array(
                    'ssl'                => array(
                    'peer_name'          => 'generic-server',
                    'verify_peer'        => FALSE,
                    'verify_peer_name'   => FALSE,
                    'allow_self_signed'  => TRUE
                )));
                
                $url  = 'http://explore.php7dev.lib.ou.edu/restep/taxonomy_term/'.$value['tid'];
                $json = file_get_contents( $url );
                $data = json_decode( $json, TRUE);

                $imgURL = 'https://explore.php7dev.lib.ou.edu/sites/default/files/' . $data['field_pillar_image']['und'][0]['filename'];
                
                
                if( $type == 'image' ){
                    $markup = (
                        '<div>'.
                            '<a href="#" data-action="openPillar" data-pillar-id="'.$data['tid'].'">'.
                                '<img src="'.$imgURL.'" />'.
                            '</a>'.
                        '</div>'
                    );
                    echo $markup;
                }
                if( $type == 'list' ){
                    $markup = (
                        '<div>'.
                            '<div class="accents left">'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                            '</div>'.
                            '<h2>'.
                                '<a href="#" data-action="openPillar" data-pillar-id="'.$data['tid'].'">'.$data['name'].'</a>'.
                            '</h2>'.
                            '<div class="accents right">'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                                '<span></span>'.
                            '</div>'.
                        '</div>'
                    );
                    echo $markup;
                }
                
            }
        }
    }

    function getIssues(){
        stream_context_set_default(array(
            'ssl'                => array(
            'peer_name'          => 'generic-server',
            'verify_peer'        => FALSE,
            'verify_peer_name'   => FALSE,
            'allow_self_signed'  => TRUE
        )));
        
        $url  = 'http://explore.php7dev.lib.ou.edu/restep/taxonomy_term/';
        $json = file_get_contents( $url );
        $data = json_decode( $json, TRUE);
        $data = array_reverse( $data );
        
        foreach( $data as $key => $value){
            if( $value['vid'] == 3){
                
                stream_context_set_default(array(
                    'ssl'                => array(
                    'peer_name'          => 'generic-server',
                    'verify_peer'        => FALSE,
                    'verify_peer_name'   => FALSE,
                    'allow_self_signed'  => TRUE
                )));
                
                $url  = 'http://explore.php7dev.lib.ou.edu/restep/taxonomy_term/'.$value['tid'];
                $json = file_get_contents( $url );
                $data = json_decode( $json, TRUE);

                $markup = (
                    '<div class="issueItem">'.
                        '<div class="img" style="background: url(https://explore.php7dev.lib.ou.edu/sites/default/files/'.$data['field_issue_image']['und'][0]['filename'].') no-repeat center center / cover;"></div>'.
                        '<div><h2><a href="#">'.$data['name'].'</a></h2><div class="description">'.$data['description'].'</div></div>'.
                    '</div>'
                );

                echo $markup;

                
            }
        }
    }