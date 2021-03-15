<template>
	<li @blur="onblur" class="list-group-item d-flex justify-content-between align-items-center">
		<div class="form-check form-check-inline">
			<input @input="changeStatus" class="form-check-input" type="checkbox" value="task.status" :checked="task.status == 'concluído'">
			<span class="title" @blur="onblur"  @click="active = true" :contentEditable="active" :class="{closed: task.status == 'concluído', 'edit': (!task.id || active)}">{{task.title}}</span>
		</div>
		<span class="badge badge-pill" :class="{'badge-primary': task.status == 'em aberto', 'badge-secondary': task.status == 'concluído'}">{{task.status}}</span>
		<span class="actions">
			<button class="btn btn-sm btn-success" v-if="!task.id || (active && !isComplete)" title="Atualizar">
				<span class="small material-icons">done</span>
			</button>
			<button v-if="task.id" title="Excluir" class="btn btn-sm btn-danger btn-rounded"><span class="small material-icons">delete_forever</span></button>
		</span>
	</li>
</template>

<script>
	export default{
		name: 'TarefaItem',
		props: ['task', 'index'],
		data: function(){
			return {
				active: false,
			}
		},
		methods: {
			update(){
				this.$emit('update', task);
			},
			// metodo para verificar se a tarefa está concluída
			changeStatus(event){
				let status = this.task.status;
				if(status == 'em aberto'){
					this.$emit('update:status', 'concluído');
				}else{
					this.$emit('update:status', 'em aberto');
				}
			},
			onblur(event){
				let text = event.target.innerText;
				this.task.title = text;
				this.active = false;
				this.$emit('update:title', this.task);
			}
		},
		computed: {
			isComplete(){
				return this.task.status == 'concluído' ? true : false;
			}
		},
		mounted(){
			if(this.task.title == ' '){
				this.active = true;
			}
		}
	}
</script>

<style lang="scss">

	li input[type='checkbox']{
		cursor: pointer;
	}
	span.edit{
		cursor: text;
		border-bottom: 1px solid #CCC;
	}
	.title{
		margin-left: .5em;
		width: 150px;
	}
	.closed{
		color:gray;
		text-decoration: line-through;
	}
	.form-check-input{
		transform: scale(1.3);
	}
</style>