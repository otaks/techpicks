
import Vue from 'vue';
import {storiesOf} from '@storybook/vue';
import MyFooter from './MyFooter';

storiesOf('MyFooter', module)
    //.add('simple', () => '<my-footer/>'
    //);


    .add('simple', () => ({
        components: {MyFooter},
        template: '<MyFooter />'
    }));