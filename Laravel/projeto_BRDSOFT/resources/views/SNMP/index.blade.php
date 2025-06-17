@extends('layout.base')

@section('title', 'SNMP')

<style>

    div#graphic{

        margin: 0 auto;
        width: 700px;

    }

    table{

        margin: 0 auto;
        width: 500px;
        margin-top: 15px;
        border: 1px solid rgba(0, 0, 0, 0.5);
        border-collapse: collapse;

    }

    th, td{

        text-align: center;
        border: 1px solid rgba(0, 0, 0, 0.5);
        padding: 20px;

    }

</style>

@section('route', route('index'))

@section('content_main')

    <form action="{{ route('snmp.index') }}" method="POST" id="send_filter">

        @csrf

        <div style="display: block; text-align: center; width: 125px; margin: 0 auto; border: 1px solid rgba(0, 0, 0, 0.24); border-radius: 50%; padding: 50px; background-color: rgba(211, 211, 211, 0.623); box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.192);">

            <select style="width: 80px; height: 30px; text-align: center;" name="filter" id="filter">

                <option value="all">All</option>

                <option {{ $type_response == 'now' ? 'selected' : '' }} value="now">Now</option>

            </select>

            <button style="width: 80px; height: 30px; margin-top: 10px;" type="submit">Filtrar</button>

        </div>

    </form>


    @if($type_response == 'now')

        <div style="display: none" id="type_response">now</div>

    @else

        <div style="display: none" id="type_response"></div>

    @endif

    <p><strong>OID {{ $OID }}</strong>: <span id="value_oid"></span></p>

    <p id="msg"></p>

    <br><br>

    <div id="graphics">

        <div id="first_graphic" class="graphic">

            <div class="titles">

                <h2>Monitoramento de uso de CPU.</h2>

                <div id="cpu">

                    <canvas id="myChart_cpu"></canvas>

                </div>

            </div>

            
            <div class="titles">

                <h2>Monitoramento de uso e memória Física.</h2>

                <div id="fisica">

                    <canvas class="pizza" id="myChart_fisica"></canvas>

                </div>

            </div>

            <div class="titles">

                <h2>Monitoramento de uso e memória SWAP.</h2>

                <div id="swap">

                    <canvas class="pizza" id="myChart_swap"></canvas>

                </div>

            </div>

        </div>

        <br><br>

        <div class="graphic">

            <div class="titles">

                <h2>Monitoramento do ifInOctets.</h2>

                <div id="octets">

                    <canvas width="520px" height="200px" id="myChart_octets"></canvas>

                </div>

            </div>

            <div>

                <div class="titles">

                    <h2>Opensips</h2>

                    <div class="status" id="opensips">

                        <p class="titulo" id="q_opensips"></p>

                    </div>

                </div>

                <div class="titles">

                    <h2>RTP Engine</h2>

                    <div class="status" id="rtpengine">

                        <p class="titulo" id="q_rtpengine"></p>

                    </div>

                </div>

            </div>

        </div>

    </div>
    

@endsection

@vite('resources/js/app.js')