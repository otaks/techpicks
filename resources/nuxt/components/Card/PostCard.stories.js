
import Vue from 'vue';
import {storiesOf} from '@storybook/vue';
import PostCard from './PostCard';

storiesOf('PostCard', module)
    .add('simple', () => ({
        components: {PostCard},
        template: '<post-card notify-comment="[ユーザ2がピックしました]" notify-time="3分前"/>'
    }));




    