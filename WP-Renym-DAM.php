<?php
/*
Plugin Name: WP Renym DAM
Plugin URI:  http://link to your plugin homepage
Description: This plugin replaces words with your own choice of words.
Version:     1.2
Author:      Freddy Muriuki 
Author URI:  http://link to your website
License:     GPL2 etc
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Copyright YEAR PLUGIN_AUTHOR_NAME (email : your email address)
(Plugin Name) is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
(Plugin Name) is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with (Plugin Name). If not, see (http://link to your plugin license).
*/

function renym_wordpress_typo_fix( $texto ) {
	return str_replace( 'wordpress', '<h3>WordPressDAM</h3>', $texto );
}
add_filter( 'the_content', 'renym_wordpress_typo_fix' );


function send($post_ID) {
$friends = 'csampedroromero@danielcastelao.org';
mail($friends,"dam wp5 updated",'Nuevo post');
return $post_ID;
}
add_action('publish_post', 'send');

function contrasinal_olvidada(){
return 'La contraseña es parecida a castelao!';
}
add_filter( 'login_errors', 'contrasinal_olvidada' );


function crear_tabla(){
   global $wpdb;

   $charset_collate = $wpdb->get_charset_collate();
   
   $table_name = $wpdb->prefix. 'palabrasmalsonantes';
   
   $sql = "CREATE TABLE $table_name (
   palabramalsonante varchar(20) NOT NULL,
   PRIMARY KEY  (palabramalsonante)
   ) $charset_collate;";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );
}

add_action('plugins_loaded','crear_tabla');

function  insertar(){
    global  $wpdb ;
    
    $table_name = $wpdb -> prefix . 'palabrasmalsonantes';
    
$search = array('Bitch','Motherfucker','Cunt','Nigger','Acojonar','Afollonada','Afollonado','Agilipollada','Agilipollado','Agilipollar','Alamierda','Amamonada','Amamonado','Amargada','Amargado','Anárquico','Anormal','Asesina','Asesinar','Asesino','Asquerosa','Asqueroso','Autoritaria','Autoritario','Autoritarismo','Badajo','Bastarda','Bastardo','Basura','Berzas','Berzotas','Bestia','Boba','Bobo','Bollera','Boluda','Boludez','Boludo','Borracha','Borrachaza','Borrachazo','Borrachera','Borracho','Borrachuza','Borrachuzo','Bronca','Bufón','Bufona','Bujarra','Bujarrilla','Bujarrón','Cabreada','Cabreado','Cabrear','Cabreo','Cabrón','Cabrona','Cabronada','Cabroncete','Caca','Cachonda','Cachondeo','Cachondo','Cagada','Cagado','Cagar','Cagarla','Cagarse','Cagoen','Cagón','Cagona','Calentorra','Calentorro','Calzonazo','Calzonazos','Camero','Celadores','Capulla','Capullo','Carajo','Carajota','Carajote','Carallo','Carnudo','Cascar','Cascarla','Casquete','Cateta','Cateto','Cazurra','Cazurro','Cencular','Cenutrio','Cepillar','Ceporra','Ceporro','Chapero','Chaquetera','Chaquetero','Chichi','Chingada','Chingar','Chivata','Chivato','Chocho','Chochona','Choriza','Chorizo','Chorra','Chorrada','Chorva','Chula','Chulilla','Chulillo','Chulita','Chulito','Chulo','Chuloputas','Chumino','Chúpame','Chúpamela','Chupópteros','Churra','Churrita','Chutarse','Chute','Cipote','Cipotón','Cojón','Cojones','Cojonudo','Comemierda','Comino','Coño','Cornuda','Cornudo','Correrse','Corrida','Corrupta','Corrupto','Cretina','Cretino','Cuerno','Cuesco','Culear','Culero','Cutre','Decapitar','Decojones','Degollar','Descojonarse','Descojone','Descojono','Desequilibrada','Desequilibrado','Desgraciada','Desgraciado','Déspota','Dictatorial','Doctorcilla','Doctorcillo','Doctorcita','Doctorcito','Drogata','Embustera','Embustero','Encabronar','Encubrimiento','Encular','Enganchada','Enganchado','Engañabobos','Engañar','Engaño','Enmascaramiento','Enmascarar','Envenenar','Escocida','Escocido','Estafa','Estafador','Estafadora','Estúpida','Estúpido','Facha','Falo','Farsante','Folla','Follada','Follado','Follador','Folladora','Follamos','Follando','Follar','Follarse','Follo','Follón','Follones','Friki','Frustrada','Frustrado','Fulana','Fulanita','Fulanito','Fulano','Furcia','Gallorda','Gamberra','Gamberro','Gañán','Gili','Gilipolla','Gilipollas','Gilipuertas','Gitaneo','Granuja','Greñudo','Guarra','Guarrita','Guarrito','Guarro','Guay','Hijadeputa','Hijaputa','Hijodeputa','Hijoputa','Hipócrita','Hostia','Huevo','Huevón','Huevona','Idiota','Ignorante','Imbécil','Impresentable','Jiñar','Jiñarse','Joder','Joderos','Jódete','Jodida','Jodido','Jodienda','Joputa','Ladrón','Ladrona','Lameculo','Litrona','Loca','Loco','Loquera','Loquero','Machacarla','Machorra','Mafia','Mafiosa','Mafioso','Majadera','Majadero','Malafolla','Malfolla','Malfollada','Malfollado','Malnacida','Malnacido','Malparida','Malparido','Mamada','Mámamela','Mamarla','Mamarracha','Mamarracho','Mameluco','Mamón','Mamona','Mamporrero','Mangante','Marica','Maricón','Maricona','Mariconazo','Marimacha','Marimacho','Mariposón','Masacre','Matanza','Matar','Matasanos','Mato','Matón','Meón','Mecorro','Medicucha','Medicucho','Mediquilla','Mediquillo','Mejiño','Melapelan','Memeo','Mentecata','Mentecato','Mentirosa','Mentiroso','Mierda','Minga','Miserable','Mocosa','Mocoso','Mogollón','Mojigata','Mojigato','Mojino','Mojón','Moña','Morralla','Mugra','Mugriente','Mugrosa','Mugroso','Nabo','Nalgas','Negligencia','Negligente','Negrata','Negrera','Negrero','Opresor','Opresora','Paja','Pajera','Pajero','Pajillera','Pajillero','Palurda','Palurdo','Pamplina','Panoli','Papanatas','Pasota','Payasa','Payaso','Pécora','Pedo','Pedorra','Pedorro','Pelandrusca','Pelandrusco','Pendeja','Pendejo','Peo','Perraso','Perversa','Perverso','Pesetera','Pesetero','Peta','Petarda','Petardo','Picha','Pichafloja','Pija','Pijar','Pijo','Pijotera','Pijotero','Pilila','Pinga','Piojosa','Piojoso','Pipote','Pirada','Pirado','Polla','Pollada','Pollón','Porcojones','Porculo','Porelculo','Porrera','Porrero','Porro','Pringada','Pringado','Proxeneta','Puerca','Puerco','Puñeta','Puñetera','Puñetero','Puta','Putada','Putero','Putilla','Putillo','Putita','Putito','Puto','Putón','Putona','Queosjodan','Querella','Rabo','Ramera','Ramero','Ratera','Ratero','Reinona','Reputa','Roña','Roñosa','Roñoso','Sabandija','Sangráis','Sangrantes','Sarasa','Sarna','Sarnosa','Sarnoso','Sinvergüenza','Soplaflautas','Soplapollas','Subidón','Subnormal','Sudaca','Tarada','Tarado','Taruga','Tarugo','Teta','Tete','Tocacojones','Tocapelotas','Tonta','Tonto','Torpe','Tortillera','Toto','Tragapollas','Tragasables','Trapicheo','Truño','Tusmuertos','Usurera','Usurero','Vividor','Vividora','Yoya','Zangana','Zangano','Zopenca','Zopenco','Zorra','Zorrilla','Zorro','Zorrón','Zorrona','Zurullo'
);
foreach ($search as $replace){
     $wpdb -> insert ( $table_name , array ( "palabramalsonante" => $replace ));
}
}

add_action('plugins_loaded' , 'insertar' );

function  filtrado($texto) {
    global  $wpdb;    
    $palabrotasArray=$wpdb->get_results("SELECT palabramalsonante FROM wp_palabrasmalsonantes");    
    $Array=array();
    foreach ($palabrotasArray as $palabra) {
       $Array[]=$palabra->palabramalsonante;
    }   
    return  str_replace($Array,'¡.....¡',$texto);
}

add_filter('the_content','filtrado');

?>