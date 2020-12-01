<?php 
/*Template Name: Template Payment Step three*/
get_header(); ?>

<section id="userPayment" class="ms-animate">
  <div data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_huesos.png">
    <div class="ms-wrap-section">

    <ul class="ms-step-list">
        <li class="checked">
          <a href="/step1" class="ms-number">1</a>
          <span class="ms-detail">Identifica <br>tu mascota</span>
        </li>
        <li class="checked">
          <a href="/step2" class="ms-number">2</a>
          <span class="ms-detail">Datos <br>de contacto</span>
        </li>
        <li class="active">
          <span class="ms-number">3</span>
          <span class="ms-detail">Servicios <br>adicionales</span>
        </li>
        <li>
          <span class="ms-number">4</span>
          <span class="ms-detail">Pago</span>
        </li>
      </ul>

      <div class="ms-header-step">
        <div class="ms-title">Servicios adicionales</div>
      </div>
      <!-- <li>
                      <div class="ms-item-servicios">
                        {{#ifeq id '1fdcf8ea-199c-11eb-aed1-50e549398ade' }}
                          <input type="checkbox" name="services" id="service-{{id}}" data-price="{{price}}" value="{{id}}" class="chekservices" required>
                        {{/ifeq }}
                        {{#ifnoteq id '1fdcf8ea-199c-11eb-aed1-50e549398ade' }}
                          <input type="checkbox" name="services" id="service-{{id}}" data-price="{{price}}" value="{{id}}" class="chekservices">
                        {{/ifnoteq }}
                        {{#ifeq serviceTypeId 'e6e3974c-04f2-4761-bff9-9ea0f48ed604' }}
                          <label for="service-{{id}}">
                        {{/ifeq }}

                        {{!-- condicionar esta impresion, si es el id del hospedaje solo imprimir <label> }} --}}
                        {{#ifnoteq serviceTypeId 'e6e3974c-04f2-4761-bff9-9ea0f48ed604' }}
                          <label for="service-{{id}}" class="special pack-a">
                        {{/ifnoteq }}
                        1fdcf8ea-199c-11eb-aed1-50e549398ade
                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title">{{name}}</span>
                              <p>{{description}}</p>
                            </div>
                            <div class="ms-price-service">S/{{price}}</div>
                          </div>
                        </label>
                      </div>
                    </li>
                     -->
      <div class="ms-wrap-ft servicesWrap">

        <div class="ms-msg-note" style="display:none">
          <strong>!Recuerda!</strong> el monto de hospedaje se multiplicará según la cantidad de días de estancia y el número de mascotas seleccionados
        </div>

        <div class="ms-tab-item">
          <div class="ms-tab-body padding">
            <div class="ms-panel">
              <div class="ms-panel-body">
                <script id="store-service-template" type="text/x-custom-template">
                  {{#each rows}}
                    <li>
                      <div class="ms-item-servicios">
                        {{#ifeq id '1fdcf8ea-199c-11eb-aed1-50e549398ade' }}
                          <input type="checkbox" name="services" id="service-{{id}}" data-price="{{price}}" data-name="{{name}}" data-quantity="" data-subtotal="" value="{{id}}" data-service-type="{{serviceTypeId}}" class="chekservices" required>
                        {{/ifeq }}
                        {{#ifnoteq id '1fdcf8ea-199c-11eb-aed1-50e549398ade' }}
                          <input type="checkbox" name="services" id="service-{{id}}" data-price="{{price}}" data-name="{{name}}" data-quantity="" data-subtotal="" value="{{id}}" data-service-type="{{serviceTypeId}}" class="chekservices">
                        {{/ifnoteq }}

                        {{#ifeq serviceTypeId 'e6e3974c-04f2-4761-bff9-9ea0f48ed604' }}
                        
                          {{#ifeq id '1fdcf8ea-199c-11eb-aed1-50e549398ade' }}
                            <label>
                          {{/ifeq}}

                          {{#ifnoteq id '1fdcf8ea-199c-11eb-aed1-50e549398ade' }}
                            <label for="service-{{id}}">
                          {{/ifnoteq }}
                          
                        {{/ifeq }}

                        {{#ifnoteq serviceTypeId 'e6e3974c-04f2-4761-bff9-9ea0f48ed604' }}

                          {{#ifeq planId '7f4c8f4b-0d06-465c-84ab-44dd3c31805c' }}
                            <label for="service-{{id}}" class="special pack-a">
                          {{/ifeq }}
                          {{#ifeq planId '03d641ca-7f0d-427a-8479-6707c16c884d' }}
                            <label for="service-{{id}}" class="special pack-b">
                          {{/ifeq }}
                          {{#ifeq planId 'a8ce191e-ba42-4659-81ac-d9c6cac6a865' }}
                            <label for="service-{{id}}">
                          {{/ifeq }}
                          
                        {{/ifnoteq }}

                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title">{{name}}</span>
                              <p>{{description}}</p>
                              <!-- {{condicional}} -->
                              <div class="ms-item-cant">Para: 

                              {{#ifeq selectPetsName 'NO' }}
                                <select disabled class="cantPet selectPetsName" name="cantPet" id="cant-pet-{{id}}" data-id="{{id}}" data-name="{{name}}"></select> 
                                mascota(s)
                              {{/ifeq }}

                              {{#ifeq selectPetsName 'SI' }}
                                <select class="cantPet" name="cantPet" id="cant-pet-{{id}}" data-id="{{id}}" data-name="{{name}}"></select> mascota(s)
                              {{/ifeq }}
                                
                              </div>
                            </div>
                            <div class="ms-price-service">S/{{price}}</div>
                          </div>
                        </label>
                      </div>
                    </li>

                  {{/each}}
                </script>
                <form id="frm-store-services" style="width: 100%">                
                  <ul class="ms-servicios-list container-services-add">
                    <!-- <li>
                      <div class="ms-item-servicios">
                        <input type="checkbox" name="services" id="service-1" data-price="60" class="chekservices">
                        <label for="service-1">
                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title">Hospedaje</span>
                              <p>Costo por día</p>
                            </div>
                            <div class="ms-price-service">S/60</div>
                          </div>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="ms-item-servicios">
                        <input type="checkbox" name="services" id="service-2" data-price="30" class="chekservices">
                        <label for="service-2">
                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title">Baño</span>
                              <p>Costo único</p>
                            </div>
                            <div class="ms-price-service">S/30</div>
                          </div>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="ms-item-servicios">
                        <input type="checkbox" name="services" id="service-3" data-price="30" class="chekservices">
                        <label for="service-3">
                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title" data-tool="Lorem ipsum">Doggy school</span>
                              <p>Costo único</p>
                            </div>
                            <div class="ms-price-service">S/30</div>
                          </div>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="ms-item-servicios">
                        <input type="checkbox" name="services" id="service-4" data-price="25" class="chekservices">
                        <label for="service-4">
                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title">Corte</span>
                              <p>Costo único</p>
                            </div>
                            <div class="ms-price-service">S/25</div>
                          </div>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="ms-item-servicios">
                        <input type="checkbox" name="services" id="service-5" data-price="30" class="chekservices">
                        <label for="service-5">
                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title">Baño</span>
                              <p>Costo por día</p>
                            </div>
                            <div class="ms-price-service">S/30</div>
                          </div>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="ms-item-servicios">
                        <input type="checkbox" name="services" id="service-6" data-price="50" class="chekservices">
                        <label for="service-6">
                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title">Baño y corte</span>
                              <p>Costo único</p>
                            </div>
                            <div class="ms-price-service">S/50</div>
                          </div>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="ms-item-servicios">
                        <input type="checkbox" name="services" id="service-7" data-price="80" class="chekservices">
                        <label for="service-7" class="special pack-a">
                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title">Paquete 1</span>
                              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
                            </div>
                            <div class="ms-price-service">S/80</div>
                          </div>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="ms-item-servicios">
                        <input type="checkbox" name="services" id="service-8" data-price="200" class="chekservices">
                        <label for="service-8" class="special pack-a">
                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title">Paquete 2</span>
                              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
                            </div>
                            <div class="ms-price-service">S/200</div>
                          </div>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="ms-item-servicios">
                        <input type="checkbox" name="services" id="service-9" data-price="420" class="chekservices">
                        <label for="service-9" class="special pack-b">
                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title">Paquete 3</span>
                              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
                            </div>
                            <div class="ms-price-service">S/420</div>
                          </div>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="ms-item-servicios">
                        <input type="checkbox" name="services" id="service-10" data-price="200" class="chekservices">
                        <label for="service-10" class="special pack-b">
                          <div class="ms-wrap-item">
                            <div class="ms-info-service">
                              <span class="ms-title">Paquete 4</span>
                              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
                            </div>
                            <div class="ms-price-service">S/200</div>
                          </div>
                        </label>
                      </div>
                    </li> -->
                  </ul>
                </form>
                <div class="ms-wrap-total">
                  <span class="ms-title">Total</span>
                  <span class="ms-total price_total" id="servicesTotal" >S/0</span>
                </div>
              </div>
              <label id="services-errorx" class="errorx">Seleccione el servicio de hospedaje</label>
            </div>
          </div>
        </div>
      </div>
      <div class="ms-wrap-btn">
        <a href="/step2" class="ms-btn">Volver</a>
        <button class="ms-btn bg-sc" id="save-step-services">Continuar</button>
      </div>
    </div>
  </div>
</section>
<?php get_footer();?>