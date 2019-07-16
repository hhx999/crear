@extends('userTest.layout')
	
	@section('title') Perfil @endsection

	@section('content')
	<header class="w3-container" style="padding-top:22px">
	    <h5><b><i class="fa fa-dashboard"></i> Mi perfil</b></h5>
	  </header>

	  <div class="w3-row-padding w3-margin-bottom">
	    <div class="w3-quarter">
	      <div class="w3-container w3-red w3-padding-16">
	        <div class="w3-left"><i class="fas fa-graduation-cap w3-xxxlarge"></i></div>
	        <div class="w3-right">
	          <h3>3</h3>
	        </div>
	        <div class="w3-clear"></div>
	        <h4>Mis capacitaciones</h4>
	      </div>
	    </div>
	    <div class="w3-quarter">
	      <div class="w3-container w3-blue w3-padding-16">
	        <div class="w3-left"><i class="fas fa-landmark w3-xxxlarge"></i></div>
	        <div class="w3-right">
	          <h3>1</h3>
	        </div>
	        <div class="w3-clear"></div>
	        <h4>Mis créditos</h4>
	      </div>
	    </div>
	    <div class="w3-quarter">
	      <div class="w3-container w3-teal w3-padding-16">
	        <div class="w3-left"><i class="fas fa-users w3-xxxlarge"></i></div>
	        <div class="w3-right">
	          <h3>1</h3>
	        </div>
	        <div class="w3-clear"></div>
	        <h4>Mis emprendimientos</h4>
	      </div>
	    </div>
	    <div class="w3-quarter">
	      <div class="w3-container w3-orange w3-text-white w3-padding-16">
	        <div class="w3-left"><i class="fas fa-award w3-xxxlarge"></i></div>
	        <div class="w3-right">
	          <h3>2</h3>
	        </div>
	        <div class="w3-clear"></div>
	        <h4>Inscripciones a globas</h4>
	      </div>
	    </div>
	  </div>
<!-- TRIGGERS PARA LOS DATOS DE UN USUARIO 

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Regions</h5>
        <img src="/w3images/region.jpg" style="width:100%" alt="Google Regional Map">
      </div>
      <div class="w3-twothird">
        <h5>Feeds</h5>
        <table class="w3-table ">
          <tr>
            <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td>New record, over 90 views.</td>
            <td><i>10 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
            <td>Database error.</td>
            <td><i>15 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
            <td>New record, over 40 users.</td>
            <td><i>17 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
            <td>New comments.</td>
            <td><i>25 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>Check transactions.</td>
            <td><i>28 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
            <td>CPU overload.</td>
            <td><i>35 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>New shares.</td>
            <td><i>39 mins</i></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
-->

	@endsection