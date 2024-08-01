<template>

	<AppHead :title="isEmpty(model) ? $t('_Roles.Create') : $t('_Roles.Edit')" />

	<Panel :title="isEmpty(model) ? $t('_Roles.Create') : $t('_Roles.Edit')">

		<template #actions>

			<ActionButton
				:ability="Ability.ROLES_INDEX"
				:label="$t('_Roles.Index')"
				:href="route('dashboard.roles.index')"
			/>

		</template>

		<Tabs
			v-if="!isEmpty(model)"
			:model="model"
		/>

		<form @submit.prevent="submit">

			<div class="panel-content">

				<FormInput
					:label="$t('Name')"
					:form="form"
					name="name"
					required
				/>

				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">

					<div class="col-span-1 md:col-span-2 lg:col-span-3 flex flex-wrap justify-between items-center">

						<h1
							class="text-sm"
							v-text="$t('Roles')"
						/>

						<Button
							size="small"
							:severity="selectAll ? 'danger' : 'primary'"
							:label="$t(selectAll ? 'Remove All' : 'Select All')"
							@click="selectAll ? toggleRemoveSelect() : toggleSelectAll()"
						/>

					</div>

					<AbilityCard
						v-for="(items, index) of abilities"
						:key="index"
					>

						<template #card-header-start>
							<div class="flex justify-between items-center text-gray-500 dark:text-white">

								{{ $t('enums.Module.' + index) }}

								<Button
									size="small"
									:severity="items.map((x) => x.key).every((elem) => form.abilities.includes(elem)) ? 'danger' : 'primary'"
									@click="items.map((x) => x.key).every((elem) => form.abilities.includes(elem)) ? toggleSelect(items, 0) : toggleSelect(items, 1)"
									:label="items.map((x) => x.key).every((elem) => form.abilities.includes(elem)) ? $t('Remove All') : $t('Select All')"
								/>

							</div>
						</template>

						<div class="grid grid-cols-1 md:grid-cols-2 gap-3">

							<template
								v-for="ability of items"
								:key="ability"
							>

								<FormCheckbox
									:id="ability.key"
									:form="form"
									name="abilities"
									:value="ability.key"
									:label="$t(`abilities.${ability.key}`)"
									forAbility
								/>

							</template>
						</div>

					</AbilityCard>
				</div>

				<SubmitButton
					:label="$t('Save')"
					:loading="form.processing"
				/>

			</div>

		</form>

	</Panel>

</template>

<script setup>

	import Tabs from './Tabs.vue';
	import { useForm } from '@inertiajs/vue3';
	import FormInput from '@/Components/Form/FormInput.vue';
	import FormCheckbox from '@/Components/Form/FormCheckbox.vue';
	import AbilityCard from '@/Components/Card/AbilityCard.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';
	import { computed, ref, onMounted } from 'vue';
	import { Ability } from '@/Classes/Ability';

	const props = defineProps({
		model: Object,
		abilities: Object,
	}), selectAll = ref(false), abilitiesCount = computed(() => {
		let count = 0;
		Object.keys(props.abilities).forEach(function (key) {
			props.abilities[key].forEach(ability => {
				count++;
			});
		});
		return count;
	});

	const form = useForm({
		name: props.model?.name,
		abilities: props.model?.abilities ?? [],
	});

	const submit = () => {
		form.post(!Object.keys(props.model).length ? route('dashboard.roles.store') : route('dashboard.roles.update', props.model?.id));
	};

	onMounted(() => {
		selectAll.value = abilitiesCount.value == form.abilities.length ? true : false;
	})

	const toggleSelect = (items, states) => {
		for (let i = 0; i < items.length; i++) {
			if (states) {
				form.abilities.push(items[i].key);
			} else {
				let index = form.abilities.indexOf(items[i].key);
				if (index > -1) {
					form.abilities.splice(index, 1);
				}
			}
		}
		selectAll.value = abilitiesCount.value == form.abilities.length ? true : false;
	};

	const toggleSelectAll = () => {
		Object.keys(props.abilities).forEach(function (key) {
			props.abilities[key].forEach(ability => {
				form.abilities.push(ability.key);
			});
		});
		selectAll.value = true;
	};

	const toggleRemoveSelect = () => {
		form.abilities = [];
		selectAll.value = false;
	};

</script>
