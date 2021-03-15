<template>
	<div class="container">
		<h3 align="center">Gerenciador de Tarefas</h3>
		<ul class="list-group mx-auto tarefas">
			<task-item v-for="(task,index) in tasksList.rows" :index="index" :task="task"
			@update:title="onUpdate"
			@update:status="task.status = $event"
			></task-item>
			<task-item :task="task" @update:title="onUpdate"></task-item>
		</ul>
	</div>
</template>

<script>
	import axios from 'axios';
	// let token = document.head.querySelector('meta[name="csrf-token"]');
	// instance.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

	import Task from './TaskItem';
	
	export default{
		name: 'Tarefas',
		data: function(){
			return {
				task: {
					description: '',
					status: '',		
					title: ' ',
				},
				tasksList: {
					rows: [
					{
						id: 3,
						title: 'um titulo',
						status: 'concluído',
						description: 'Uma descrição',
					},
					{
						id: 5,
						title: 'um titulo 2',
						status: 'em aberto',
						description: 'Uma descrição 2',
					}
					],
				}
			}
		},
		components: {
			taskItem: Task
		},
		methods: {
			getTasks(){
				return {};
			},
			onUpdate(event){
				this.updateTask(event);
			},
			updateTask(task){
				axios.post('api/tasks/task/', task)
				.then(response =>{
					console.log(response.data);
				})
				.catch(error => {
					console.error(error);
				})
			},
			removeTask(k){
				return false;
			},
			updateStatus(k){

			},
		}
	}
</script>

<style lang="scss">
	@import '../css/bootstrap.css';
	.tarefas{
		max-width: 480px;
	}
</style>