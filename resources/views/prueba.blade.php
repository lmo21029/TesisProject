<!DOCTYPE html>
<html lang="en">
<head>
    <script src="TweenLite.min.js"></script>


</head>
<body class="login">

<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Por favor Ingrese</h3>
                </div>
                <div class="panel-body">
                    <form id="registro" method="post" action="/users">
                    <%= form_for(resource, as: resource_name, url: session_path(resource_name)) do |f| %>
                    <fieldset>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="name">
                            <%= f.email_field :email, autofocus: true,class:"form-control", :placeholder => "Correo" %>
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" id="apellido">
                            <%= f.email_field :email, autofocus: true,class:"form-control", :placeholder => "Correo" %>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" id="email">
                            <%= f.email_field :email, autofocus: true,class:"form-control", :placeholder => "Correo" %>
                        </div>
                        <div class="form-group">
                            <label>Cedula</label>
                            <input type="number" id="cedula">
                            <%= f.email_field :email, autofocus: true,class:"form-control", :placeholder => "Correo" %>
                        </div>
                        <div class="form-group">
                            <label>Direccion</label>
                            <input type="text" id="direccion">
                            <%= f.email_field :email, autofocus: true,class:"form-control", :placeholder => "Correo" %>
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="number" id="telefono">
                            <%= f.email_field :email, autofocus: true,class:"form-control", :placeholder => "Correo" %>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password">
                            <%= f.password_field :password, autocomplete: "off",class:"form-control", :placeholder => "Clave" %>
                        </div>
                        <div class="checkbox">
                            <label>
                                <% if devise_mapping.rememberable? -%>
                                <div class="field">
                                    <%= f.check_box :remember_me %>
                                    <%= f.label :Recuerdame %>
                                </div>
                                <% end -%>
                            </label>
                        </div>
                        <button type="submit">Enviar</button>
                        <%= f.submit "Entrar",:class => "btn btn-lg btn-success btn-block" %>
                        <%= link_to "Registrate", new_registration_path(resource_name) %>
                    </fieldset>
                    <% end %>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>