<template>
	<div class="container">
		<h1 align="center">Gerenciador de Tarefas</h1>
		<ul class="list-group mx-auto tarefas">
			<task-item v-for="(task,k) in tasksList.rows" :key="k" :task="task" @update:status="task.status = $event"></task-item>
			<task-item :task="task"></task-item>
		</ul>
	</div>
</template>

<script>
	import Task from './TaskItem';
	export default{
		name: 'Tarefas',
		data: function(){
			return {
				task: {
					description: '',
					status: '',		
					title: 'Adicionar',
				},
				tasksList: {
					rows: [
					{
						title: 'um titulo',
						status: 'concluído',
						description: 'Uma descrição',
					},
					{
						title: 'um titulo 2',
						status: 'closed',
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
				console.log(event)
			},
			updateTask(){
				axios.post('api/tasks/task/', {id: 3})
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