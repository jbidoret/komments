<template>
  <div class="kommentsListEntries">
<k-komments-list>
  <k-komment v-for="komment in pendingKomments" :key="komment.id">
    <img class="avatar" :src="komment.image"/>
    <div class="info">

      <a :href="komment.authorurl" v-if="komment.authorurl !== ''" target="_blank">{{komment.author}}</a>
      <span v-else>{{komment.author}}</span>

    <span>{{printKommentType(komment.kommentType)}}</span>
    <span>{{komment.spamlevel}}</span>
    <span>PUB</span>
    <span>Options</span>
    </div>
    <span class="status">
      <k-icon type="protected" v-if="komment.spamlevel > 100"/>
      <k-icon type="circle-half" v-else-if="!komment.status"/>
      <k-icon type="circle-filled" v-else/>
    </span>
  </k-komment>
</k-komments-list>
  </div>
</template>

<script>
import Gravatar from './Gravatar.vue';

export default {
  components: { Gravatar },
      data() {
    return {
      pendingKomments: 'loading…',
    };
  },
  created() {
    this.load();
    setInterval(() => {
      this.load();
    }, 60000);
  },
  props: {
    label: String,
  },
  methods: {
    load() {
      this.$api.get("komments/queued").then((komments) => {
        this.pendingKomments = komments;
      });
    },
    printKommentType(kommentType) {
      switch (kommentType) {
        case 'LIKE': return 'liked'
        case 'KOMMENT': return 'answered'
        default: return '???'
      }
    },
    
  },
}
</script>

<style>
    k-komment {
        display: grid;
        grid-template-columns: 40px auto 1fr;
        grid-column-gap: 10px;
        align-items: center;
        background: #fff;
        box-shadow: var(--box-shadow-item);
        margin-bottom: 10px;
    }

    .avatar {
      width: 40px;
    }

    .status {
      justify-self: end;
    }

    a {
      text-decoration: underline;
      font-weight: bold;
    }

</style>