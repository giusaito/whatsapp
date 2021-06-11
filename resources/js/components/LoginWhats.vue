<template>
    <div>
        <h1 class="text-center">{{status}}</h1>
        <img v-if="status =='QRCODE'" :src="this.qrcode" class="d-block mx-auto">
    </div>
</template>

<script>

  export default {
    data() {
      return {
        urlLogin: 'http://whatsapp.leo/painel/whatsapp/qrcode-login-update',
        qrcode: "",
        status: "",
      }
    },
    props: ['qrcodeOrStatus'],
    methods: {
      loginValidate: function loginValidate(){
        var self = this;
        const requestStatus = axios.get(this.urlLogin);
        var self = this;
        axios
          .get('http://whatsapp.leo/painel/whatsapp/qrcode-login-update').then(function(response){
            self.qrcode = response.data.qrcode;
            self.status = response.data.status;
            if(self.status == "CONNECTED"){
                clearInterval(self.interval);
                // window.location.href = "../noticia";
            }
          })
          .finally(() => {
              console.log('final');

            })
          .catch(errors => {
           console.log('erro');
          });

      }
    },
    beforeDestroy: function () {
      //Evitando vazamento de memória para o usuário, diminui um pouco a velocidade de carregamento ao navegar pelo select
    	this.loginValidate.destroy();
	},
    mounted() {
    //   this.loginValidate();
      var jsQrCode = JSON.parse(this.qrcodeOrStatus);
      this.qrcode = jsQrCode.qrcode;
      this.status = jsQrCode.status;
      this.interval = setInterval(() => this.loginValidate(), 5000);
    }
}
</script>
