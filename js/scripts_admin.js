// aw_rest_api_settigns variable que viene de php
window.addEventListener('load',()=>{
    
    // logica del cpanel
    const ventanas={
      ventana_1:{
        buton:btn_aw_page_1,
        page:aw_page_1,
        create_promo_form:create_promo_form,
        prev:prev_shortcode,
        type:'promos'
      },
      ventana_2:{
        buton:btn_aw_page_2,
        page:aw_page_2,
        create_promo_form:create_banner_form,
        prev:prev_shortcode_banners,
        type:'banners'
      }
    }
    
    if(ventanas.ventana_1.page){
      active_page(ventanas.ventana_1.page)
      
      //Formulario para crear las promos
      ventanas.ventana_1.create_promo_form.addEventListener('submit',async(e)=>{
        e.preventDefault()
        const promo = {}
        //se obtienen todos los inputs
        const inputs = ventanas.ventana_1.create_promo_form.querySelectorAll('input')
        const button = ventanas.ventana_1.create_promo_form.querySelector('#submit_form_promos')
        for(input of inputs){
          if(input.value == ''){
            return alert('campo '+input.name+' vacio')
          }
          promo[input.name] = input.value
        }
        button.textContent = 'espere...'
        button.disabled = true
        const {status,msg} = await create_promo({body:promo,post_type:ventanas.ventana_1.type})
        button.textContent = 'crear promo'
        button.disabled = false
        if(status=='error'){
          return alert('Error '+msg)
        }
        const {promos} = await get_promos({post_type:ventanas.ventana_1.type})
            render_items({items:promos,post_type:ventanas.ventana_1.type})
        })
      //selecciona los inputs para recrear la vista previa
      const inputs = ventanas.ventana_1.create_promo_form.querySelectorAll('input')
      //se les añade el evento keyup para tener un prev de lo que se está escribiendo
      for(input of inputs){
        input.addEventListener('keyup',(e)=>{          
          render_prev({post_type:ventanas.ventana_1.type,input:e.target,html_element:ventanas.ventana_1.prev})
        })
        input.addEventListener('change',(e)=>{          
          render_prev({post_type:ventanas.ventana_1.type,input:e.target,html_element:ventanas.ventana_1.prev})
        })
      }
      const btn_logo = ventanas.ventana_1.create_promo_form.querySelector('#logo_link_btn_promos')
      if(btn_logo){
          btn_logo.addEventListener('click',(e)=>{
            e.preventDefault()
            const prev = ventanas.ventana_1.prev.querySelector('.container_logo_promos img')
            //selecciona el campo donde pintará la url de la imagen subida
            set_logo_url({input:inputs[3],prev})
          })
      }
      
      (async()=>{
        const {promos} = await get_promos({post_type:ventanas.ventana_1.type})
        render_items({items:promos,post_type:ventanas.ventana_1.type})
      })()
      
    }


    
    ventanas.ventana_1.buton.addEventListener('click',()=>{
      active_page(ventanas.ventana_1.page)
      //Formulario para crear las promos
      ventanas.ventana_1.create_promo_form.addEventListener('submit',async(e)=>{
          e.preventDefault()
          
          const promo = {}
          //se obtienen todos los inputs
          const inputs = ventanas.ventana_1.create_promo_form.querySelectorAll('input')
          const button = ventanas.ventana_1.create_promo_form.querySelector('#submit_form_promos')
          for(input of inputs){
            if(input.value == ''){
              return alert('campo '+input.name+' vacio')
            }
            promo[input.name] = input.value
          }
          button.textContent = 'espere...'
          button.disabled = true
          const {status,msg} = await create_promo({body:promo,post_type:ventanas.ventana_1.type})
          button.disabled = false
          button.textContent = 'crear promo'
          if(status=='error'){
            return alert('Error '+msg)
          }
          const {promos} = await get_promos({post_type:ventanas.ventana_1.type})
          render_items({items:promos,post_type:ventanas.ventana_1.type})
      })
      //selecciona los inputs para recrear la vista previa
      const inputs = ventanas.ventana_1.create_promo_form.querySelectorAll('input')
      //se les añade el evento keyup para tener un prev de lo que se está escribiendo
      for(input of inputs){
        input.addEventListener('keyup',(e)=>{          
          render_prev({post_type:ventanas.ventana_1.type,input:e.target,html_element:ventanas.ventana_1.prev})
        })
        input.addEventListener('change',(e)=>{          
          render_prev({post_type:ventanas.ventana_1.type,input:e.target,html_element:ventanas.ventana_1.prev})
        })
      }
      const btn_logo = ventanas.ventana_1.create_promo_form.querySelector('#logo_link_btn_promos')
      if(btn_logo){
          btn_logo.addEventListener('click',(e)=>{
            e.preventDefault()
            const prev = ventanas.ventana_1.prev.querySelector('.container_logo_promos img')
            //selecciona el campo donde pintará la url de la imagen subida
            set_logo_url({input:inputs[3],prev})
          })
      }
      (async()=>{
        const {promos} = await get_promos({post_type:ventanas.ventana_1.type})
        render_items({items:promos,post_type:ventanas.ventana_1.type})
      })()
      
    })

    
    ventanas.ventana_2.buton.addEventListener('click',()=>{
      
      //Formulario para crear las promos
      ventanas.ventana_2.create_promo_form.addEventListener('submit',async(e)=>{
          e.preventDefault()
          const promo = {}
          //se obtienen todos los inputs
          const inputs = ventanas.ventana_2.create_promo_form.querySelectorAll('input')
          const button = ventanas.ventana_2.create_promo_form.querySelector('#submit_form_banners')
          for(input of inputs){
            if(input.value == ''){
              return alert('campo '+input.name+' vacio')
            }
            promo[input.name] = input.value
          }
          button.textContent = 'espere...'
          button.disabled = true
          const {status,msg} = await create_promo({body:promo,post_type:ventanas.ventana_2.type})
          button.textContent = 'crear banner'
          button.disabled = false
          if(status=='error'){
            return alert('Error '+msg)
          }
          const {promos} = await get_promos({post_type:ventanas.ventana_2.type})
          render_items({items:promos,post_type:ventanas.ventana_2.type})
      })
      //selecciona los inputs para recrear la vista previa
      const inputs = ventanas.ventana_2.create_promo_form.querySelectorAll('input')
      //se les añade el evento keyup para tener un prev de lo que se está escribiendo
      for(input of inputs){
        input.addEventListener('keyup',(e)=>{          
          render_prev({post_type:ventanas.ventana_2.type,input:e.target,html_element:ventanas.ventana_2.prev})
        })
        input.addEventListener('change',(e)=>{          
          render_prev({post_type:ventanas.ventana_2.type,input:e.target,html_element:ventanas.ventana_2.prev})
        })
      }
      const btn_logo = ventanas.ventana_2.create_promo_form.querySelector('#logo_link_btn_banners')
      if(btn_logo){
          btn_logo.addEventListener('click',(e)=>{
            e.preventDefault()
            const prev = ventanas.ventana_2.prev.querySelector('.container_logo_banners img')
            //selecciona el campo donde pintará la url de la imagen subida
            set_logo_url({input:inputs[2],prev})
          })
      }
      
      (async()=>{
        const {promos} = await get_promos({post_type:ventanas.ventana_2.type})
        render_items({items:promos,post_type:ventanas.ventana_2.type})
      })()
      active_page(ventanas.ventana_2.page)
    })
});

//methods
const active_page = (page)=>{
  const articles = document.querySelector('#aw_admin_body').querySelectorAll('article')
  for(element of articles){
    element.classList.remove('show')
  }
  page.classList.add('show')
}
const render_prev = ({input,html_element,post_type})=>{
  if(post_type=='promos'){
    const title_texts = html_element.querySelectorAll('.title_promo b')
    const list_item = html_element.querySelector('.list_pronosticos .list_item_pronostico')
    if(input.name == 'post_title'){
      title_texts[0].textContent = input.value
    }

    if(input.name == 'title_color'){
      title_texts[0].style.color = input.value
    }
    
    if(input.name == 'background_color'){
      html_element.style.backgroundColor = input.value
    }
    if(input.name == 'list_item_border_color'){
      list_item.style.borderBottom = '2px solid '+input.value
    }
    return
  }
  if(post_type=='banners'){
    const title_texts = html_element.querySelectorAll('.title_banners b')
    const logo = html_element.querySelector('.container_logo_banners img')
    const background_card = html_element.querySelector('.grid_card_banners')
    const background_button = html_element.querySelector('.container_button_banners a')
    const background_logo = html_element.querySelector('.container_logo_banners')
    
    if(input.name == 'post_title'){
      title_texts[0].textContent = input.value
    }

    if(input.name == 'title_color'){
      title_texts[0].style.color = input.value
    }
    if(input.name == 'logo_link'){
      logo.src = input.value
    }
    if(input.name == 'background_color'){
      background_card.style.backgroundColor = input.value
    }
    if(input.name == 'background_button'){
      background_button.style.backgroundColor = input.value
    }
    if(input.name == 'text_color_button'){
      background_button.style.color = input.value
    }
    if(input.name == 'background_logo'){
      background_logo.style.backgroundColor = input.value
    }
  }
}
const render_items = ({items,post_type})=>{
  const tbody_promos = document.querySelector(`#aw_cpanel_tabla_${post_type} tbody`)
  const template_body_promos = document.getElementById(`template_body_${post_type}`).content  
  const fragment = document.createDocumentFragment()
  tbody_promos.innerHTML = ''
  for(let i=0;i<items.length;i++){
    template_body_promos.querySelector('tr').id = items[i].ID
    template_body_promos.querySelector('tr .id').textContent = items[i].ID
    template_body_promos.querySelector('tr .titulo').textContent = items[i].post_title
    template_body_promos.querySelector('tr .status').textContent = items[i].post_status

    const clone = template_body_promos.cloneNode(true)
    fragment.appendChild(clone)
  }
  tbody_promos.appendChild(fragment)
}
const aw_activate_item = async(e)=>{
  const id = e.parentElement.parentElement.id
  const post_type = e.attributes.post_type.textContent
  
  e.textContent = '...'
  e.disabled = true
  const {status,msg} = await activate_promo({id,post_type})
  
  if(status=='error' || !status){
    return  alert(msg)
  }
  const {promos} = await get_promos({post_type})
 
  render_items({items:promos,post_type})
}
const aw_delete_item = async(e)=>{
  const id = e.parentElement.parentElement.id
  const post_type = e.attributes.post_type.textContent
  e.textContent = '...'
  e.disabled = true
  const {status,msg} = await delete_promo({id,post_type})
  
  if(status=='error' || !status){
    return  alert(msg)
  }
  const {promos} = await get_promos({post_type})
 
  render_items({items:promos,post_type})
}
const set_logo_url = ({input,prev})=>{
  var mediaUploader;
    //
      if (mediaUploader) {
          mediaUploader.open();
          return;
      }

    // 
    mediaUploader = wp.media.frames.file_frame = wp.media({
              title: 'Selecionar Imagen',
              button: {
              text: 'Selecionar Imagen'
          }, multiple: true });

    // 
    mediaUploader.on('select', function() {
          attachment = mediaUploader.state().get('selection').first().toJSON();
          input.value = attachment.url 
          prev.src = attachment.url 
      });
    
    // 
    mediaUploader.open();
  }
// HTTP METHODS
const create_promo = async({body})=>{
  
    const req = await fetch(`${aw_rest_api_settigns.root}aw_rest_api/v1/create_promo`,{
      method:'post',
      body:JSON.stringify(body),
      headers:{
        "content-type":"application/json"
      }
    })
    return await req.json()
  
}
const get_promos = async({post_type})=>{
  try {
    const req = await fetch(`${aw_rest_api_settigns.root}aw_rest_api/v1/get_promos?post_type=${post_type}`)
    return await req.json()
  } catch (error) {
    console.error(error)
  }
}
const activate_promo = async({id,post_type})=>{
  try {
    const req = await fetch(`${aw_rest_api_settigns.root}aw_rest_api/v1/activate_promo`,{
      method:'PUT',
      body:JSON.stringify({id,post_type}),
      headers:{
        "content-type":"application/json"
      }
    })
    return await req.json()
  } catch (error) {
    console.error(error)
  }
}
const delete_promo = async({id,post_type})=>{
  try {
    const req = await fetch(`${aw_rest_api_settigns.root}aw_rest_api/v1/delete_promo`,{
      method:'DELETE',
      body:JSON.stringify({id,post_type}),
      headers:{
        "content-type":"application/json"
      }
    })
    return await req.json()
  } catch (error) {
    console.error(error)
  }
}