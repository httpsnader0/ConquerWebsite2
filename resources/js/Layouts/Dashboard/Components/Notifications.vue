<template>

	<div>

		<Sidebar
			icon="bell"
			buttonClass="w-11 h-11 p-0 flex justify-center items-center"
		>

			<template #header>

				<div
					class="w-full h-16 flex justify-start items-center gap-3 p-5 border-b border-border-light dark:border-border-dark bg-darkbg-secondary font-bold text-lg text-white"
					v-text="$t('Notifications')"
				/>

			</template>

			<template #content>

				<template v-if="$page.props.auth?.notifications?.length">

					<div class="flex flex-col gap-5 p-5">

						<Notification
							v-for="(notification, index) in $page.props.auth?.notifications"
							:key="index"
							:notification="notification"
							:index="index"
						/>

					</div>

				</template>

				<template v-else>

					<div
						class="w-full h-full flex flex-col justify-center items-center font-bold text-gray-400"
						v-text="$t('Empty Notifications')"
					/>

				</template>

			</template>

			<template #footer>

				<div class="w-full h-16 flex justify-start items-center p-1 dark:bg-darkbg-secondary border-t border-border-light dark:border-border-dark">

					<Link
						:href="route('dashboard.profile.notifications.index')"
						@click="notificationVisible = false"
						class="w-full"
					>

					<Button
						class="w-full !flex justify-center items-center gap-3"
						size="small"
					>
						<Icon :icon="['fas', 'bell']" />
						{{ $t('View All Notifications') }}
					</Button>

					</Link>

				</div>

			</template>

		</Sidebar>

	</div>

</template>

<script setup>

	import Sidebar from '@/Components/Shared/Sidebar.vue';
	import Notification from './Notification.vue';

</script>