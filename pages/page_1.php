<?php


function aw_cpanel_page_1(){ ?>
    <style>
        .create_promo_form{
            grid-column:1 / span 2;
            padding:0 5px;
        }
        .create_promo_form input{
            width:100%;
            display:block;
        }
        .create_promo_form label{
            text-transform:uppercase;
            font-weight:bold;
        }
        .create_promo_form button{
            margin: 10px 0;
            background: rgb(70,130,245);
            color: white;
            padding: 5px;
            text-transform: uppercase;
            border: unset;
            box-shadow: 0px 0px 1px blue;
            cursor: pointer;
        }
        .create_promo_form .container_color{
            display:grid;
            grid-template-columns:repeat(3,1fr);
        }
        #prev_shortcode{
            grid-column: 1 / span 6;
            box-shadow:0px 0px 1px black;
            border-radius:3px;
            padding:10px 0;
            margin:10px auto;
            max-width:600px;
        }
        #prev_shortcode > .title_promo{
            text-align:center;
        }
        #prev_shortcode > .title_promo b{
            text-transform:uppercase;
            font-size:21px;
        }
        #prev_shortcode > .title_promo .container_logo_promos{
            margin-bottom:20px;
            height:60px;
            padding-bottom:10px;
            border-bottom:2px solid grey;
        }
        #prev_shortcode > .title_promo .container_logo_promos img{
            margin:auto;
            width:95%;height:50px;
            object-fit:contain;
        }
        #prev_shortcode .list_pronosticos  .list_item_pronostico{
            display:grid !important;
            grid-template-columns:1fr 120px;
            border-top:2px solid black;
            border-bottom:2px solid black;
            padding:10px;
        }
        .list_item_pronostico .enfrentamiento small{
            font-weight:bold;
        }
        .list_item_pronostico .enfrentamiento p{
            color:grey;
            text-transform:capitalize;
            font-size:1.2rem;
        }
        .list_item_pronostico .ganancia{
            border-left:2px solid black;
            padding-left:5px;
            display:grid;
            place-items:center;
            place-content:center;
        }
        #aw_cpanel_tabla_promos{
            grid-column: auto / span 4;
            border-spacing:0;
        }
        
        #aw_cpanel_tabla_promos thead{
            background:rgb(220,220,220);
        }
        #aw_cpanel_tabla_promos thead td{
            text-transform:uppercase;
            line-height:2;
        }
        #aw_cpanel_tabla_promos tbody tr:nth-child(2n){
            background:rgb(230,230,230);
        }
        #aw_cpanel_tabla_promos .promos_table_actions{
            width:130px;
        }
        #aw_cpanel_tabla_promos .promos_table_actions button{
            background:lightgreen;
            padding:3px 5px;
            border:unset;
            cursor:pointer;
            margin:5px;
            border-radius:5px;
        }
        #aw_cpanel_tabla_promos .promos_table_actions button:nth-child(2){
            background:darkorange;
        }
        #prev_shortcode .btn_apuesta{
            position:absolute;
            bottom:-4%;
            width:200px;
            padding:5px 10px;
            border-radius:7px;
            background:green;
            left:calc(50% - 100px);
            text-align:center;
            text-transform:uppercase;
            color:white;
        }
    </style>
	<form id="create_promo_form" class="create_promo_form">
        <div>
            <label>Titulo</label>
            <input type="text" name="post_title" required>
        </div>
        <div>
            <label>Bono</label>
            <input type="text" name="bono" required>
        </div>
        <div>
            <label>Refear Link</label>
            <input type="url" name="refear_link" required>
        </div>
        <div>
            <label>Logo Link</label>
            <input id="logo_link_promos" readonly type="url" name="logo_link" required>
            <button id="logo_link_btn_promos" >logo</button>
        </div>
        <div class="container_color">
            <div>
                <label>BG color</label>            
                <input type="color" name="background_color" value="#ffffff" required>
            </div>
            <div>
                <label>T color</label>            
                <input type="color" name="title_color" required>
            </div>
            <div>
                <label>BR color</label>            
                <input type="color" name="list_item_border_color" value="#4682f5" required>
            </div>
        </div>
        <input type="hidden" name="post_type" value="promos">
        <button id="submit_form_promos">crear promo</button>
    </form>
	
    <table id="aw_cpanel_tabla_promos" column-span="none">
        <thead>
            <tr>
                <td class="id">id</td>
                <td class="titulo">titulo</td>
                <td class="status">status</td>
                <td class="promos_table_actions">acciones</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="id">..</td>
                <td class="titulo">..</td>
                <td class="status">..</td>
                <td class="promos_table_actions">..</td>
            </tr>
        </tbody>
    </table>

    <div id="prev_shortcode">
        <div class="title_promo">
            <div class="container_logo_promos">
                <img src="" alt="logo">
            </div>

            <b>Titulo de la tabla de anuncios</b>
        </div>
        <p style='text-align:right;padding:2px 50px;font-weight:bold;' >Ganas</p>
        <div class="list_pronosticos">
            <div class="list_item_pronostico">
                <div class="enfrentamiento" >
                    <small>equipo 1 vs equipo 2</small>
                    <p class="eleccion" >Eleccion (2.2) </p>
                </div>
                <div class="ganancia">50$</div>
            </div>
        </div>
    </div>

    <template id="template_body_promos">
        <tr>
            <td class="id">id</td>
            <td class="titulo">titulo</td>
            <td class="status">status</td>
            <td class="promos_table_actions" >
                <button onclick="aw_activate_item(this)" post_type="promos" >activar</button>
                <button onclick="aw_delete_item(this)" post_type="promos">eliminar</button>
            </td>
        </tr>
    </template>
<?php }