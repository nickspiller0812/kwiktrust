/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');
require('../../node_modules/jquery-confirm/js/jquery-confirm');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('file-component', require('./components/FileComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

// $('#date-picker-example').pickadate();
// $('#datepicker').datepicker({
//     uiLibrary: 'bootstrap'
// });

let Web3 = require('web3');
import {appConfig} from "./config/app.config";
import {kwikTrustAbi} from "./Ethereum/smartContracts/kwiktrust.abi";

$(document).ready(function () {

    let web3 = new Web3(appConfig.testnetAddr);
    let contract = new web3.eth.Contract(kwikTrustAbi, appConfig.smartContractHash);
    console.log(contract);
    let docData = contract.methods.get(3344123).call();
    console.log(docData);

});

function ValidateDate(dtValue)
{
    const regex = /\b\d{1,2}[\/]\d{1,2}[\/]\d{4}\b/;
    var dtRegex = new RegExp(regex);
    return dtRegex.test(dtValue);
}


$(document).ready(function () {
    $("#btn-upload").on('click', function (e) {
        e.preventDefault();

        if($("#fileName").val() === "") {

            $("#fileName").css('border-bottom', 'solid red 2px');
            return false;
        } else {
            $("#fileName").css('border-bottom', 'none');
        }

        if($("#fileDescription").val() === "") {

            $("#fileDescription").css('border-bottom', 'solid red 2px');
            return false;
        } else {
            $("#fileDescription").css('border-bottom', 'none');
        }

        if(!ValidateDate($("#fileReleaseDate").val())) {

            $("#fileReleaseDate").css('border-bottom', 'solid red 2px');
            return false;
        } else {
            $("#fileReleaseDate").css('border-bottom', 'none');
        }

        if(!ValidateDate($("#fileExpirationDate").val())) {

            $("#fileExpirationDate").css('border-bottom', 'solid red 2px');
            return false;
        } else {
            $("#fileExpirationDate").css('border-bottom', 'none');
        }

        if($("#fileContent").val() === "") {

            $("#fileContent").css('border-bottom', 'solid red 2px');
            return false;
        } else {
            $("#fileContent").css('border-bottom', 'none');
        }

        let web3 = new Web3(appConfig.testnetAddr);
        const account = web3.eth.accounts.privateKeyToAccount(appConfig.privateKey);
        web3.eth.accounts.wallet.add(account);
        let from = web3.eth.accounts.wallet[0].address;
        let name = $('#fileName').val();
        let release_time = $('#fileReleaseDate').val();
        let expiration_time = $('#fileExpirationDate').val();
        let description = $('#fileDescription').val();
        let exp_dates_arr = expiration_time.split("/");
        let exp_date = new Date(exp_dates_arr[2], exp_dates_arr[1] - 1 , exp_dates_arr[0]);

        let rel_dates_arr = release_time.split("/");
        let rel_date = new Date(rel_dates_arr[2], rel_dates_arr[1] - 1 , rel_dates_arr[0]);

        let hash = Date.parse(Date());
        $('#hash').val(hash);

        let contract = new web3.eth.Contract(kwikTrustAbi, appConfig.smartContractHash);


        web3.eth.getTransactionCount(from).then(function(nonce) {
            contract.methods.add(hash, web3.utils.utf8ToHex(MD5(description)), Date.parse(rel_date), Date.parse(exp_date), 0).estimateGas({
                from: web3.eth.accounts.wallet[0].address
            }).then(function(gas) {

                console.log('wywolany');//info for developer
                $('#loading').show();//loader spinner

                contract.methods.add(hash, web3.utils.utf8ToHex(MD5(description)), Date.parse(rel_date), Date.parse(exp_date), 0).send({
                    gasPrice: gas * 400000,
                    gas: gas * 60,
                    from,
                    nonce
                }).then(function() {
                    $("#btn-upload").attr("disabled", true);
                    $('.file-upload').submit();
                });
            });
        });
    });
});


$(document).ready(function () {

    let documents = $('.generatedFile');
    let web3 = new Web3(appConfig.testnetAddr);
    let contract = new web3.eth.Contract(kwikTrustAbi, appConfig.smartContractHash);

    for(var i = 0; i < documents.length; i++)
    {
        if(i === 3) {
            let hash = $(documents[i]).children("input[name=hash]").val();
            let docData = contract.methods.get(hash).call().then(function(res) {
                // let date = new Date();
                // console.log(res);
                let date = new Date((res[0].expirationTime) / 1000);
                let date2 = new Date((res[0]).initializationTime / 1000);
                // console.log(timeConverter(res[0].initializationTime));
                // console.log(res[0].initializationTime);
                // console.log(res[0].expirationTime);
                // console.log(timeConverter(res[0].expirationTime));
                // var d = new Date(res[0].expirationTime/1000);
                // alert(d.toUTCString());
                // var date = new Date(unixtimestamp*1000);
                // console.log(res[0].expirationTime);
                // Year
                // console.log(new Date());
                var year = date.getFullYear();

                // console.log(date2.getFullYear());
                // // console.log(date.getYear());
                // console.log(year);
            });
        }
    }

});

function timeConverter(UNIX_timestamp){
    var a = new Date(UNIX_timestamp);
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    var year = a.getFullYear();
    var month = months[a.getMonth()];
    var date = a.getDate();
    var hour = a.getHours();
    var min = a.getMinutes();
    var sec = a.getSeconds();
    var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
    return time;
}

var MD5 = function (string) {


    function RotateLeft(lValue, iShiftBits) {


        return (lValue << iShiftBits) | (lValue >>> (32 - iShiftBits));


    }


    function AddUnsigned(lX, lY) {


        var lX4, lY4, lX8, lY8, lResult;


        lX8 = (lX & 0x80000000);


        lY8 = (lY & 0x80000000);


        lX4 = (lX & 0x40000000);


        lY4 = (lY & 0x40000000);


        lResult = (lX & 0x3FFFFFFF) + (lY & 0x3FFFFFFF);


        if (lX4 & lY4) {


            return (lResult ^ 0x80000000 ^ lX8 ^ lY8);


        }


        if (lX4 | lY4) {


            if (lResult & 0x40000000) {


                return (lResult ^ 0xC0000000 ^ lX8 ^ lY8);


            } else {


                return (lResult ^ 0x40000000 ^ lX8 ^ lY8);


            }


        } else {


            return (lResult ^ lX8 ^ lY8);


        }


    }


    function F(x, y, z) {
        return (x & y) | ((~x) & z);
    }


    function G(x, y, z) {
        return (x & z) | (y & (~z));
    }


    function H(x, y, z) {
        return (x ^ y ^ z);
    }


    function I(x, y, z) {
        return (y ^ (x | (~z)));
    }


    function FF(a, b, c, d, x, s, ac) {


        a = AddUnsigned(a, AddUnsigned(AddUnsigned(F(b, c, d), x), ac));


        return AddUnsigned(RotateLeft(a, s), b);


    };


    function GG(a, b, c, d, x, s, ac) {


        a = AddUnsigned(a, AddUnsigned(AddUnsigned(G(b, c, d), x), ac));


        return AddUnsigned(RotateLeft(a, s), b);


    };


    function HH(a, b, c, d, x, s, ac) {


        a = AddUnsigned(a, AddUnsigned(AddUnsigned(H(b, c, d), x), ac));


        return AddUnsigned(RotateLeft(a, s), b);


    };


    function II(a, b, c, d, x, s, ac) {


        a = AddUnsigned(a, AddUnsigned(AddUnsigned(I(b, c, d), x), ac));


        return AddUnsigned(RotateLeft(a, s), b);


    };


    function ConvertToWordArray(string) {


        var lWordCount;


        var lMessageLength = string.length;


        var lNumberOfWords_temp1 = lMessageLength + 8;


        var lNumberOfWords_temp2 = (lNumberOfWords_temp1 - (lNumberOfWords_temp1 % 64)) / 64;


        var lNumberOfWords = (lNumberOfWords_temp2 + 1) * 16;


        var lWordArray = Array(lNumberOfWords - 1);


        var lBytePosition = 0;


        var lByteCount = 0;


        while (lByteCount < lMessageLength) {


            lWordCount = (lByteCount - (lByteCount % 4)) / 4;


            lBytePosition = (lByteCount % 4) * 8;


            lWordArray[lWordCount] = (lWordArray[lWordCount] | (string.charCodeAt(lByteCount) << lBytePosition));


            lByteCount++;


        }


        lWordCount = (lByteCount - (lByteCount % 4)) / 4;


        lBytePosition = (lByteCount % 4) * 8;


        lWordArray[lWordCount] = lWordArray[lWordCount] | (0x80 << lBytePosition);


        lWordArray[lNumberOfWords - 2] = lMessageLength << 3;


        lWordArray[lNumberOfWords - 1] = lMessageLength >>> 29;


        return lWordArray;


    };


    function WordToHex(lValue) {


        var WordToHexValue = "", WordToHexValue_temp = "", lByte, lCount;


        for (lCount = 0; lCount <= 3; lCount++) {


            lByte = (lValue >>> (lCount * 8)) & 255;


            WordToHexValue_temp = "0" + lByte.toString(16);


            WordToHexValue = WordToHexValue + WordToHexValue_temp.substr(WordToHexValue_temp.length - 2, 2);


        }


        return WordToHexValue;


    };


    function Utf8Encode(string) {


        string = string.replace(/\r\n/g, "\n");


        var utftext = "";


        for (var n = 0; n < string.length; n++) {


            var c = string.charCodeAt(n);


            if (c < 128) {


                utftext += String.fromCharCode(c);


            }


            else if ((c > 127) && (c < 2048)) {


                utftext += String.fromCharCode((c >> 6) | 192);


                utftext += String.fromCharCode((c & 63) | 128);


            }


            else {


                utftext += String.fromCharCode((c >> 12) | 224);


                utftext += String.fromCharCode(((c >> 6) & 63) | 128);


                utftext += String.fromCharCode((c & 63) | 128);


            }


        }


        return utftext;


    };


    var x = Array();


    var k, AA, BB, CC, DD, a, b, c, d;


    var S11 = 7, S12 = 12, S13 = 17, S14 = 22;


    var S21 = 5, S22 = 9, S23 = 14, S24 = 20;


    var S31 = 4, S32 = 11, S33 = 16, S34 = 23;


    var S41 = 6, S42 = 10, S43 = 15, S44 = 21;


    string = Utf8Encode(string);


    x = ConvertToWordArray(string);


    a = 0x67452301;
    b = 0xEFCDAB89;
    c = 0x98BADCFE;
    d = 0x10325476;


    for (k = 0; k < x.length; k += 16) {


        AA = a;
        BB = b;
        CC = c;
        DD = d;


        a = FF(a, b, c, d, x[k + 0], S11, 0xD76AA478);


        d = FF(d, a, b, c, x[k + 1], S12, 0xE8C7B756);


        c = FF(c, d, a, b, x[k + 2], S13, 0x242070DB);


        b = FF(b, c, d, a, x[k + 3], S14, 0xC1BDCEEE);


        a = FF(a, b, c, d, x[k + 4], S11, 0xF57C0FAF);


        d = FF(d, a, b, c, x[k + 5], S12, 0x4787C62A);


        c = FF(c, d, a, b, x[k + 6], S13, 0xA8304613);


        b = FF(b, c, d, a, x[k + 7], S14, 0xFD469501);


        a = FF(a, b, c, d, x[k + 8], S11, 0x698098D8);


        d = FF(d, a, b, c, x[k + 9], S12, 0x8B44F7AF);


        c = FF(c, d, a, b, x[k + 10], S13, 0xFFFF5BB1);


        b = FF(b, c, d, a, x[k + 11], S14, 0x895CD7BE);


        a = FF(a, b, c, d, x[k + 12], S11, 0x6B901122);


        d = FF(d, a, b, c, x[k + 13], S12, 0xFD987193);


        c = FF(c, d, a, b, x[k + 14], S13, 0xA679438E);


        b = FF(b, c, d, a, x[k + 15], S14, 0x49B40821);


        a = GG(a, b, c, d, x[k + 1], S21, 0xF61E2562);


        d = GG(d, a, b, c, x[k + 6], S22, 0xC040B340);


        c = GG(c, d, a, b, x[k + 11], S23, 0x265E5A51);


        b = GG(b, c, d, a, x[k + 0], S24, 0xE9B6C7AA);


        a = GG(a, b, c, d, x[k + 5], S21, 0xD62F105D);


        d = GG(d, a, b, c, x[k + 10], S22, 0x2441453);


        c = GG(c, d, a, b, x[k + 15], S23, 0xD8A1E681);


        b = GG(b, c, d, a, x[k + 4], S24, 0xE7D3FBC8);


        a = GG(a, b, c, d, x[k + 9], S21, 0x21E1CDE6);


        d = GG(d, a, b, c, x[k + 14], S22, 0xC33707D6);


        c = GG(c, d, a, b, x[k + 3], S23, 0xF4D50D87);


        b = GG(b, c, d, a, x[k + 8], S24, 0x455A14ED);


        a = GG(a, b, c, d, x[k + 13], S21, 0xA9E3E905);


        d = GG(d, a, b, c, x[k + 2], S22, 0xFCEFA3F8);


        c = GG(c, d, a, b, x[k + 7], S23, 0x676F02D9);


        b = GG(b, c, d, a, x[k + 12], S24, 0x8D2A4C8A);


        a = HH(a, b, c, d, x[k + 5], S31, 0xFFFA3942);


        d = HH(d, a, b, c, x[k + 8], S32, 0x8771F681);


        c = HH(c, d, a, b, x[k + 11], S33, 0x6D9D6122);


        b = HH(b, c, d, a, x[k + 14], S34, 0xFDE5380C);


        a = HH(a, b, c, d, x[k + 1], S31, 0xA4BEEA44);


        d = HH(d, a, b, c, x[k + 4], S32, 0x4BDECFA9);


        c = HH(c, d, a, b, x[k + 7], S33, 0xF6BB4B60);


        b = HH(b, c, d, a, x[k + 10], S34, 0xBEBFBC70);


        a = HH(a, b, c, d, x[k + 13], S31, 0x289B7EC6);


        d = HH(d, a, b, c, x[k + 0], S32, 0xEAA127FA);


        c = HH(c, d, a, b, x[k + 3], S33, 0xD4EF3085);


        b = HH(b, c, d, a, x[k + 6], S34, 0x4881D05);


        a = HH(a, b, c, d, x[k + 9], S31, 0xD9D4D039);


        d = HH(d, a, b, c, x[k + 12], S32, 0xE6DB99E5);


        c = HH(c, d, a, b, x[k + 15], S33, 0x1FA27CF8);


        b = HH(b, c, d, a, x[k + 2], S34, 0xC4AC5665);


        a = II(a, b, c, d, x[k + 0], S41, 0xF4292244);


        d = II(d, a, b, c, x[k + 7], S42, 0x432AFF97);


        c = II(c, d, a, b, x[k + 14], S43, 0xAB9423A7);


        b = II(b, c, d, a, x[k + 5], S44, 0xFC93A039);


        a = II(a, b, c, d, x[k + 12], S41, 0x655B59C3);


        d = II(d, a, b, c, x[k + 3], S42, 0x8F0CCC92);


        c = II(c, d, a, b, x[k + 10], S43, 0xFFEFF47D);


        b = II(b, c, d, a, x[k + 1], S44, 0x85845DD1);


        a = II(a, b, c, d, x[k + 8], S41, 0x6FA87E4F);


        d = II(d, a, b, c, x[k + 15], S42, 0xFE2CE6E0);


        c = II(c, d, a, b, x[k + 6], S43, 0xA3014314);


        b = II(b, c, d, a, x[k + 13], S44, 0x4E0811A1);


        a = II(a, b, c, d, x[k + 4], S41, 0xF7537E82);


        d = II(d, a, b, c, x[k + 11], S42, 0xBD3AF235);


        c = II(c, d, a, b, x[k + 2], S43, 0x2AD7D2BB);


        b = II(b, c, d, a, x[k + 9], S44, 0xEB86D391);


        a = AddUnsigned(a, AA);


        b = AddUnsigned(b, BB);


        c = AddUnsigned(c, CC);


        d = AddUnsigned(d, DD);


    }


    var temp = WordToHex(a) + WordToHex(b) + WordToHex(c) + WordToHex(d);


    return temp.toLowerCase();
}
