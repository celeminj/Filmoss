@extends('index.index')
@section('contenido')

    <div class="metodo_pago">
        <div class="titulo-metodo_pago">
            <h1>AÑADIR METODO DE <span>PAGO</span></h1>
        </div>
        <div class="imagenes-metodo_pago">
            <img id="mastercard" src="{{ asset('images/Mastercard-logo.png') }}" alt="">
            <img id="visa" src="{{ asset('images/Visa_Logo.png') }}" alt="">
            <img id="paypal" src="{{ asset('images/Paypal_logo.png') }}" alt="">
            <img id="google" src="{{ asset('images/Google_Pay_Logo.png') }}" alt="">
        </div>
        <div class="formulario-metodo_pago">
            <form action="">
                <label for="tipo-tarjeta">
                    <h3>Tipo tarjeta</h3>
                </label>
                <select class="form-select" aria-label="Default select example" id="tipo-tarjeta">
                    <option selected>-</option>
                    <option value="1">MasterCard</option>
                    <option value="2">Visa</option>
                    <option value="3">PayPal</option>
                    <option value="4">GooglePay</option>
                </select>

                <div class="mb-3">
                    <label for="nombre-titular">
                        <h3>Nombre del titular</h3>
                    </label>
                    <input type="text" class="form-control" id="nombre-titular"
                        placeholder="Introduce el nombre del titular">
                </div>

                <div class="mb-3">
                    <label for="numero-tarjeta">
                        <h3>Número de tarjeta</h3>
                    </label>
                    <input type="text" class="form-control" maxlength="16" id="numero-tarjeta"
                        placeholder="0000-0000-0000-0000">
                </div>

                <div class="fecha-cvv">
                    <div class="mb-3">
                        <label for="fecha-cad">
                            <h3>Fecha caducidad</h3>
                        </label>
                        <input type="date" class="form-control" id="fecha-cad">
                    </div>
                    <div class="mb-3">
                        <label for="cvv">
                            <h3>CVV</h3>
                        </label>
                        <input type="text" class="form-control" id="cvv"
                            placeholder="000" maxlength="3" inputmode="numeric">
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                    <label class="form-check-label" for="checkDefault">
                      <p>Acepto las políticas de privacidad</p>
                    </label>
                </div>
                <div class="boton-pago">
                    <button type="button" class="btn btn-primary" id="boton-pago">PAGAR</button>
                </div>





            </form>
        </div>

    </div>
