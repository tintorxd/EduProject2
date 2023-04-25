<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
   
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-6">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Usuerio/</span> Registrar Nuevo</h4>
      </div>
      <div class="offset-md-3 col-md-3">
        @if (session("action")=='error')
        <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
          <div>
              No se pudo registrar al administrador
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
        </div>
        @endif
        @if (session("action")=='success')
        <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <div>
              Administrador Registrado Correctamente
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
        </div>
        @endif
    </div>
  </div>
               
  
                <!-- Basic Layout -->
                <div class="row" s>
                  
                  <div class="col-md" style="padding-left: 150px; padding-right: 150px">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Nuevo usuario</h5>
                        <small class="text-muted float-end">Administrador</small>
                      </div>
                      <div class="card-body">
                        <form action="{{ route('registerAdmin.create') }}" method="post">
                          @csrf
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Nombres</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                name="names"
                                placeholder="John Ejemplo"
                                aria-label="John Ejemplo"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Apellidos</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                name="lastnames"
                                placeholder="Quiroga Doe"
                                aria-label="Quiroga Doe"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                            </div>
                          </div>
                                            
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Correo electrónico</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                              <input
                                type="email"
                               name="email"
                                class="form-control"
                                placeholder="john@ejemplo.com"
                                aria-label="john.doe"
                                aria-describedby="basic-icon-default-email2"
                              />
                              <span id="basic-icon-default-email2" class="input-group-text">@ejemplo.com</span>
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Contraseña</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                              <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="S#98MMNJA"
                                aria-label="john.doe"
                                aria-describedby="basic-icon-default-email2"
                              />
                              
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">N° de telefono</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-phone"></i
                              ></span>
                              <input
                                type="text"
                                name="phone_number"
                                class="form-control phone-mask"
                                placeholder="658 799 8941"
                                aria-label="658 799 8941"
                                aria-describedby="basic-icon-default-phone2"
                              />
                            </div>
                          </div>
                    
                          
                          <button type="submit" class="btn btn-primary">Registrar</button>
                          
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>