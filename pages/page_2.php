<?php


function aw_cpanel_page_2(){ ?>
    <style>
        .create_banner_form{
            grid-column:1 / span 2;
            padding:0 5px;
        }
        .create_banner_form input{
            width:100%;
            display:block;
        }
        .create_banner_form .container_color{
            display:grid;
            grid-template-columns:repeat(3,1fr);
        }
        .create_banner_form label{
            text-transform:uppercase;
            font-weight:bold;
        }
        .create_banner_form button{
            margin:10px 0;
            background:rgb(70,130,245);
            color:white;
            padding:5px;
            text-transform:uppercase;
            border:unset;
            box-shadow:0px 0px 1px blue;
            cursor:pointer;
        }
        #prev_shortcode_banners{
            grid-column: 1 / span 6;
            max-width:600px;
            margin:0 auto;
        }
        #prev_shortcode_banners > .title_banner{
            text-align:center;
        }
        #prev_shortcode_banners > .title_banner b{
            text-transform:uppercase;
            font-size:21px;
            padding:10px 0;
        }
        #prev_shortcode_banners > .grid_card_banners{
            display:grid;
            grid-template-columns:120px 1fr 120px;
            box-shadow:0px 0px 1px black;
            border-radius:7px;
            padding:0;
            margin:10px;
            background:white;
            overflow:hidden;
        }
        #prev_shortcode_banners > .grid_card_banners .container_logo_banners{
            display:grid;
        }
        #prev_shortcode_banners > .grid_card_banners .container_logo_banners img{
            width:100%;
            height:100%;
            object-fit:contain;
        }
        #prev_shortcode_banners > .grid_card_banners .container_logo_banners,
        #prev_shortcode_banners > .grid_card_banners .container_slogan_banners,
        #prev_shortcode_banners > .grid_card_banners .container_button_banners {
            display:grid;
            place-items:center;
            place-content:center;
            padding:15px 5px;
            text-align:center;
        }
        #prev_shortcode_banners > .grid_card_banners .container_slogan_banners{
            font-weight:bold;
        }
        #prev_shortcode_banners > .grid_card_banners .container_button_banners a{
            text-transform:uppercase;
            padding:3px 10px;
            text-decoration:none;
            background-color:lightgreen;
        }
        #aw_cpanel_tabla_banners{
            grid-column: auto / span 4;
            border-spacing:0;
        }
        
        #aw_cpanel_tabla_banners thead{
            background:rgb(220,220,220);
        }
        #aw_cpanel_tabla_banners thead td{
            text-transform:uppercase;
            line-height:2;
        }
        #aw_cpanel_tabla_banners tbody tr:nth-child(2n){
            background:rgb(230,230,230);
        }
        #aw_cpanel_tabla_banners .banners_table_actions{
            width:130px;
        }
        #aw_cpanel_tabla_banners .banners_table_actions button{
            background:lightgreen;
            padding:3px 5px;
            border:unset;
            cursor:pointer;
            margin:5px;
            border-radius:5px;
        }
        #aw_cpanel_tabla_banners .banners_table_actions button:nth-child(2){
            background:darkorange;
        }
    </style>
	<form id="create_banner_form" class="create_banner_form">
        <div>
            <label>Titulo</label>
            <input type="text" name="post_title" required>
        </div>
        <div>
            <label>Refear Link</label>
            <input type="url" name="refear_link" required>
        </div>
        <div>
            <label>Logo Link</label>
            <input id="logo_link_banners" readonly type="url" name="logo_link" required>
            <button id="logo_link_btn_banners" >logo</button>
        </div>
        <div class="container_color">
            <div>
                <label>BG color</label>            
                <input type="color" name="background_color" value="#ffffff" required>
            </div>
            <div>
                <label>BG button</label>            
                <input type="color" name="background_button" value="#90ee90" required>
            </div>
            <div>
                <label>TB color</label>            
                <input type="color" name="text_color_button" value="#ffffff" required>
            </div>
            <div>
                <label>T color</label>            
                <input type="color" name="title_color" required>
            </div>
            <div>
                <label>BG logo</label>            
                <input type="color" name="background_logo" required>
            </div>
        </div>
        <input type="hidden" name="post_type" value="banners">
        <button id="submit_form_banners" >crear banner</button>
    </form>
	
    <table id="aw_cpanel_tabla_banners" >
        <thead>
            <tr>
                <td class="id">id</td>
                <td class="titulo">titulo</td>
                <td class="status">status</td>
                <td class="banners_table_actions">acciones</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="id">..</td>
                <td class="titulo">..</td>
                <td class="status">..</td>
                <td class="banners_table_actions">..</td>
            </tr>
        </tbody>
    </table>

    <div id="prev_shortcode_banners">
        <div class="title_banners">
            <b>Titulo de la tabla de anuncios</b>
        </div>
        <div class="grid_card_banners">
            <div class="container_logo_banners">
                <img src="/icon.ico" alt="logo">
            </div>
            <div class="container_slogan_banners">
                <p>apuesta tu y gana 500$</p>
            </div>
            <div class="container_button_banners">
                <a href="#" >Apuesta</a>
            </div>
        </div>
    </div>

    <template id="template_body_banners">
        <tr>
            <td class="id">id</td>
            <td class="titulo">titulo</td>
            <td class="status">status</td>
            <td class="banners_table_actions" >
                <button onclick="aw_activate_item(this)" post_type="banners">activar</button>
                <button onclick="aw_delete_item(this)" post_type="banners">eliminar</button>
            </td>
        </tr>
    </template>
<?php }