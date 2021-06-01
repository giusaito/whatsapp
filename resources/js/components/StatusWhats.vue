<template>
    <div>
        <li class="nav-item d-none d-sm-inline-block">
           <i class="text-success fas fa-circle" v-if="infoStatus.status == true"> Online</i>
           <i class="text-danger fas fa-circle" v-if="infoStatus.status == false && revaliditing == false" title="Seção online"> Offline
               <a v-on:click="revalidateSession" class="text-success" href="#"><strong>RECONECTAR</strong></a>
               </i>
           <i class="text-warning fas fa-circle" v-if="infoStatus.status == 3"> Atenção</i>
           <i class="text-warning fas fa-circle" v-if="revaliditing"> Reconectando, isso pode demorar até 2 minutos</i>
      </li>
        <li class="nav-item d-none d-sm-inline-block">
            <i class="text-danger fas fa-circle" v-if="infoBattery.batterylevel < 20"> {{infoBattery.batterylevel}}% BATERIA FRACA</i>
        </li>
    </div>
</template>

<script>

  export default {
    data() {
      return {
        urlCheckStatus: 'http://whatsapp.leo/painel/whatsapp/check-status',
        urlCheckBattery: 'http://whatsapp.leo/painel/whatsapp/check-battery',
        infoStatus: false,
        infoBattery: false,
        generateUrl: '',
        revaliditing: false,
        expireValidated: '',

      }
    },
    props: ['revalidateUrl'],
    methods: {
      revalidateSession: function revalidateSession(){
          var self = this;
          sessionStorage.setItem('expireValidated', self.expireValidated);
          axios.get(self.generateUrl).then(function(response){
              self.revaliditing = true;
            alert('Inicializando, isso pode levar até 2 minutos');
        }).catch(function(error){
          alert('Ocorreu um erro ao tentar revalidar, a página será recarregada automaitcamente. Por favor, tente novamente');
          document.location.reload(true);
        })
      },
      checkStatus: function checkStatus(){
        var self = this;
        const requestStatus = axios.get(this.urlCheckStatus);
        const requestBattery = axios.get(self.urlCheckBattery);

        axios
          .all([requestStatus, requestBattery])
          .then(
            axios.spread((...responses) => {
              const responseStatus = responses[0]['data'];
              const responseBattery = responses[1]['data'];

              this.infoStatus = responseStatus;
              this.infoBattery = responseBattery;


            })
          ).finally(() => {
              const favicon = document.getElementById("favicon");
              if(this.infoStatus.status){
                this.revaliditing = false;
                favicon.href = "/wifi-on.png";
              }
              else if(this.infoStatus.status == false){
                document.title = "Sessão Offline";
                favicon.href = "/wifi-off.png";
              }else{
                document.title = "Ocorreu um erro";
                favicon.href = "/bug.png";
              }
              if(this.infoBattery.batterylevel < 20){
                document.title = "BATERIA FRACA";
                favicon.href = "/battery-status.png";
            }

            })
          .catch(errors => {
            document.title = "Erro";
            favicon.href = "/bug.png";
          });

      }
    },
    beforeDestroy: function () {
      //Evitando vazamento de memória para o usuário, diminui um pouco a velocidade de carregamento ao navegar pelo select
    	this.checkStatus.destroy();
	},
    mounted() {
      this.generateUrl = 'http://whatsapp.leo/painel/whatsapp/login?CGN=LEO-' + this.revalidateUrl;
      this.checkStatus();
      this.expireValidated = parseInt(this.revalidateUrl) + parseInt(2);

      if(typeof sessionStorage.getItem('expireValidated') !== undefined && parseInt(sessionStorage.getItem('expireValidated')) > parseInt(this.revalidateUrl)){
        this.revaliditing = true;
      }else {
          this.revaliditing = false;
          sessionStorage.removeItem('expireValidated')
      }

    }
}
</script>
