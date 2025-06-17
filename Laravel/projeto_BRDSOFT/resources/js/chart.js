import Chart from 'chart.js/auto'
import $ from 'jquery'

let endpoint;

let type_response = window.document.querySelector('#type_response')

if(type_response.innerHTML == 'now'){

    endpoint = 'http://127.0.0.1:8000/api/v1/snmp/index/1'

} else {

    endpoint = 'http://127.0.0.1:8000/api/v1/snmp/index/0'

}

let msg = window.document.querySelector('#msg')
let value_oid = window.document.querySelector('#value_oid')

// Instanciando os gráficos canvas.
const ctx_octets = document.getElementById('myChart_octets')
const ctx_cpu = document.getElementById('myChart_cpu')
const ctx_swap = document.getElementById('myChart_swap')
const ctx_fisica = document.getElementById('myChart_fisica')

// Instanciando as DIVs de status.
const ctx_opensips = document.getElementById('q_opensips')
const ctx_rtpengine = document.getElementById('q_rtpengine')

// Instanciando os campos Octets.
let dados_octets = [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]

let labels_octets = [
    
    '00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'

]

// Gráfico Octets.
let grafico_octets = new Chart(ctx_octets, {

    type:'line',

    data:{

        labels: labels_octets,

        datasets:[{ 

          label: 'Octets',

          data: dados_octets,

          fill: false,

          borderColor: 'rgb(75, 192, 192)',

          tension: 0.1

        }]

    },

    options:{

      scales:{

        y:{

            min: 0,
            max: 0,
            ticks: {

                stepSize: 500000000
            }

        }

      }

    }

})

// Gráfico Monitoramento CPU.
let labels_CPU = ['Usado', 'Total']

let grafico_CPU = new Chart(ctx_cpu, {

    type: 'doughnut',

    data:{

        labels: labels_CPU,

        datasets:[{

          label: 'Monitoramento da CPU',
          
          data: [0, 100],

          backgroundColor:[

            'rgb(54, 162, 235)',
            'rgb(54, 235, 84)'

          ],

          hoverOffset: 2

        }]

      }

})

// Gráfico Monitoramento de Mémoria SWAP.
let labels_SWAP = ['Total', 'Disponível', 'Em uso']

let grafico_SWAP = new Chart(ctx_swap, {

    type: 'doughnut',

    data:{

        labels: labels_SWAP,

        datasets:[{

          label: 'Monitoramento da Memória SWAP',
          
          data: [0, 0, 0],

          backgroundColor:[

            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(69, 235, 54)'

          ],

          hoverOffset: 4

        }]

      }

})

// Gráfico Monitoramento de Mémoria Física.
let labels_Fisica = ['Total', 'Disponível', 'Em uso']

let grafico_Fisica = new Chart(ctx_fisica, {

    type: 'doughnut',

    data:{

        labels: labels_Fisica,

        datasets:[{

          label: 'Monitoramento da Memória Física',
          
          data: [0, 0, 0],

          backgroundColor:[

            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(69, 235, 54)'

          ],

          hoverOffset: 4

        }]

      }

})

function dadosAPI(){

    $.ajax({

        url: endpoint,
        method: 'GET',
        dataType: 'json',

        success: function(api){

            // Octets.
            value_oid.innerHTML = `${api.OID_octets}.`

            if(api.msg_octets != ''){

                msg.innerHTML = api.msg_octets

                ctx_octets.style.display = 'none'

            } else {

                ctx_octets.style.display = 'block'

                grafico_octets.options.scales.y.min = parseInt(api.OID_octets_min)
    
                grafico_octets.options.scales.y.max = parseInt(api.OID_octets_max)
    
                grafico_octets.data.labels = api.labels_octets

                console.log(grafico_octets.data.labels)
    
                grafico_octets.data.datasets[0].data = api.datas_octets
    
                grafico_octets.update()

                msg.innerHTML = 'API consumida com sucesso!';

            }

            // CPU.
            grafico_CPU.data.datasets[0].data[0] = api.value_CPU

            grafico_CPU.update()

            // Memória SWAP.
            grafico_SWAP.data.datasets[0].data[0] = api.swap_total
            grafico_SWAP.data.datasets[0].data[1] = api.swap_disponivel
            grafico_SWAP.data.datasets[0].data[2] = api.swap_total - api.swap_disponivel

            console.log(grafico_SWAP.data.datasets[0].data[2])

            grafico_SWAP.update()

            // Memória Física.
            grafico_Fisica.data.datasets[0].data[0] = api.fisica_total
            grafico_Fisica.data.datasets[0].data[1] = api.fisica_disponivel
            grafico_Fisica.data.datasets[0].data[2] = api.fisica_uso

            grafico_Fisica.update()

            // Opensips.
            ctx_opensips.innerHTML = api.opensips

            console.log(opensips)

            // FTP Engine.
            ctx_rtpengine.innerHTML = api.rtpengine
            
        },

        error: function(){

            msg.innerHTML = "Servidor da API fora do ar! Tente novamente mais tarde."

        }

    })

}

dadosAPI()

setInterval(dadosAPI, 30000)