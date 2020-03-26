<template>
    <div class="card col-md-2 p-0 m-4">
        <div class="view overlay">
            <img class="card-img-top" src="https://cdn2.iconfinder.com/data/icons/file-format-colorful/100/pdf-512.png" alt="Card image cap">
        </div>

        <a class="btn-floating btn-action ml-auto mr-4 mdb-color lighten-3"><i class="fas fa-chevron-right pl-1"></i></a>

        <div class="card-body">
            <h4 class="card-title">Document pdf</h4>
            <hr>
            <p class="card-text">Description of pdf document, lorem ipsum...</p>
        </div>

        <div class="card-footer">
            <div class="rounded-bottom mdb-color lighten-3">
                <ul class="list-unstyled list-inline font-small mb-0">
                    <span class="btn-group-sm">
                      <button type="button" class="btn btn-danger bmd-btn-fab">
                        <i class="material-icons glyphicon glyphicon-alert"></i>
                      </button>
                    </span>
                    <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i>06/10/2015</li>
                    <li class="list-inline-item pr-2"></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import web3 from 'web3'
    import {kwikTrustAbi} from "../Ethereum/smartContracts/kwiktrust.abi"
    import {appConfig} from "../config/app.config.js";

    export default {
        props: ['hash'],
        data() {
            return {
                loading:false
            }
        },
        methods: {
            makeRequest () {

                // this.loading = true //the loading begin
                // axios.get('/example')
                //     .then(response => {
                //         this.loading = false //the loading stop when the response given from server
                //         //do whatever with response
                //     })
                //     .catch(error => {
                //         this.loading = false
                //         //do whatever with response
                //     })
            }
        },
        created() {
            console.log(appConfig);
            // Vue.http.headers.common['Access-Control-Allow-Origin'] = '*';
            // var web3 = new Web3(new Web3.providers.HttpProvider(appConfig.testnetAddr));

            let headers = {
                headers: [{
                    name: 'Access-Control-Allow-Origin',
                    value: appConfig.testnetAddr
                }]
            };

            let request = new Web3.providers.HttpProvider(appConfig.testnetAddr, headers);
            request.withCredentials = 'true';
            // request.setRequestHeader('access-control-allow-headers', 'Content-Type');
            // request.setRequestHeader('access-control-allow-methods', 'POST');
            // request.setRequestHeader('access-control-allow-origin', '*');

            let web3 = new Web3(
                request
            );

            const account = web3.eth.accounts.privateKeyToAccount(appConfig.privateKey);
            console.log(account);
            // web3.eth.accounts.wallet.add(account);
            // let contract = web3.eth.Contract(kwikTrustAbi, appConfig.smartContractHash);
            // console.log(contract);
            // let fileData = contract.methods.get(this.hash).call();
            // console.log(fileData);
            // return {
            //     fileData
            // }
        },
        mounted() {
            console.log('File component mounted')
        }
    }
</script>
