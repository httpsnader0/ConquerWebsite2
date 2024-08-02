<template>

	<AppHead :title="isEmpty(model) ? $t('_Events.Create') : $t('_Events.Edit')" />

	<Panel :title="isEmpty(model) ? $t('_Events.Create') : $t('_Events.Edit')">

		<template #actions>

			<ActionButton
				:ability="Ability.EVENTS_INDEX"
				:label="$t('_Events.Index')"
				:href="route('dashboard.events.index')"
			/>

		</template>

		<Tabs
			v-if="!isEmpty(model)"
			:model="model"
		/>

		<form @submit.prevent="submit">

			<div class="panel-content">

				<FormSelect
					:label="$t('Type')"
					:form="form"
					name="type"
					:options="typeOptions"
					filterable
					clearable
					required
				/>

				<FormTranslatable
					:label="$t('Name')"
					:form="form"
					name="name"
					required
				/>

				<FormTranslatable
					:label="$t('Time')"
					:form="form"
					name="time"
					required
				/>

				<Fieldset>
					<template #legend>

						<div class="flex items-center justify-center gap-10">

							{{ $t('Reward') }}

							<Button
								size="small"
								severity="secondary"
								@click="addReward"
							>
								<Icon :icon="['fas', 'plus']" />
							</Button>

						</div>

					</template>

					<div class="grid grid-cols-1 gap-5">
						<template
							v-for="(reward, index) in form.rewards"
							:key="index"
						>
							<div class="border p-5 rounded relative">

								<FormReward
									:index="index"
									:form="form"
									:reward="reward"
								/>

								<template v-if="form.rewards.length > 1">

									<Button
										class="absolute top-0 ltr:right-0 rtl:left-0 opacity-50 hover:opacity-100 hover-animate"
										size="small"
										severity="danger"
										@click="removeReward(index)"
									>
										<Icon :icon="['fas', 'trash']" />
									</Button>

								</template>

							</div>

						</template>
					</div>
				</Fieldset>

				<FormTranslatableEditor
					:label="$t('Explain')"
					:form="form"
					name="explain"
					required
				/>

				<SubmitButton
					:label="$t('Save')"
					:loading="form.processing"
				/>

			</div>

		</form>

	</Panel>

	<pre>{{ model?.data?.translation }}</pre>

</template>

<script setup>

	import Tabs from './Tabs.vue';
	import { useForm } from '@inertiajs/vue3';
	import FormSelect from '@/Components/Form/FormSelect.vue';
	import FormTranslatable from '@/Components/Form/FormTranslatable.vue';
	import FormTranslatableEditor from '@/Components/Form/FormTranslatableEditor.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';
	import { Ability } from '@/Classes/Ability';
	import FormReward from "./FormReward.vue";
	import Fieldset from 'primevue/fieldset';
	import { onBeforeMount } from 'vue';

	const props = defineProps({
		model: Object,
		typeOptions: Object,
	});

	const form = useForm({
		type: props.model?.type,
		name: props.model?.translation?.name ?? { ar: '', en: '' },
		time: props.model?.translation?.time ?? { ar: '', en: '' },
		rewards: [],
		explain: props.model?.translation?.explain ?? { ar: '', en: '' },
	});

	onBeforeMount(() => {
		
		if (!Object.keys(props.model).length) {
			form.rewards.push({
				rewardName: { ar: '', en: '' },
			});
		}

		props.model?.rewards?.forEach((reward, index) => {
			form.rewards.push({
				rewardName: reward.translation?.name ?? { ar: '', en: '' },
			})
		});

	});

	const submit = () => {
		form.post(!Object.keys(props.model).length ? route('dashboard.events.store') : route('dashboard.events.update', props.model?.slug));
	};

	const addReward = () => {
		form.rewards.push({
			rewardName: { ar: '', en: '' },
		});
	}

	const removeReward = (index) => {
		form.rewards.splice(index, 1);
	}

</script>
