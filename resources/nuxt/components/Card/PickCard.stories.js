
import Vue from 'vue';
import {storiesOf} from '@storybook/vue';
import PickCard from './PickCard';

storiesOf('PickCard', module)
    .add('simple', () => ({
        components: {PickCard},
        template: `
            <pick-card 
                notify-comment="[ユーザ2がピックしました]"
                notify-time="3分前"
                pickcard-title="記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル"
                pickComment="ピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメント"
                man-name="Marialllescas"
                follower-num="13"
                pick-num="2"
                shozoku="〇×△株式会社"
                like-num="4"
                pickcardPicksNumber="100"
                pickcardPvNumber="3"
                />
            `
    }));




    