<template>
	  <li @blur="onblur" class="list-group-item d-flex justify-content-between align-items-center">
	  	<div class="form-check form-check-inline">
	  	  <input @input="isCompleted" class="form-check-input" type="checkbox" value="task.status" :checked="task.status == 'concluído'">
	  	  <span @click="isCompleted" :contentEditable="active" :class="{closed: task.status == 'concluído'}">{{task.title}}</span>
	  	</div>
		 <span class="badge badge-primary badge-pill">{{task.status}}</span>
	</li>
</template>

<script>
	export default{
		name: 'TarefaItem',
		props: ['task'],
		data: function(){
			return {
				active: false,
			}
		},
		methods: {
			isCompleted(event){
				// let checked = event.target.checked;
				let status = this.task.status;
				// let task = this.task;
				if(status == 'em aberto'){
					this.$emit('update:status', 'concluído');
				}else{
					this.$emit('update:status', 'em aberto');
				}
			},
			onblur(event){
				// let task = event.task;
				// alert('perdeu foco');
			}
		},
		mounted(){
			if(this.task.title == 'Adicionar'){
				this.active = true;
			}
		}
	}
</script>

<style lang="scss">
	.closed{
		text-decoration: line-through;
	}
	.form-check-input{
		transform: scale(1.3);
	}
	/*@import '../css/bootstrap.css';*/
</style>