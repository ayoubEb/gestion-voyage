@if(Session::has("remplir"))
<div @class(["row","justify-content-center","animate__animated","animate__fadeInRight"])>
  <div @class(["col-lg-6","mb-2"])>
    <div @class(["text-white","msg-remplir","py-2","rounded","px-3","text-center"])>
      <i @class(["mdi","mdi-alert-circle-outline","mdi-18px","align-middle"])></i>
      {{ Session::get('remplir') }}
    </div>
  </div>
</div>
@elseif (Session::has('update'))
<div @class(["row","justify-content-center","animate__animated","animate__fadeInRight"])>
  <div @class(["col-lg-6","mb-2"])>
    <div @class(["text-white","msg-update","py-2","rounded","px-3","text-center"])>
      <i @class(["mdi","mdi-check-circle-outline","mdi-18px","align-middle"])></i>
      {{ Session::get('update') }}
    </div>
  </div>
</div>


@endif