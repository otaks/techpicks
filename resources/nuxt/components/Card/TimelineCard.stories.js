
import Vue from 'vue';
import {storiesOf} from '@storybook/vue';
import TimelineCard from './TimelineCard';

storiesOf('TimelineCard', module)
    .add('simple', () => ({
        components: {TimelineCard},
        template: `
        <timeline-card
            notify-comment="[ユーザ2がピックしました]"
            notify-time="3分前"
            timeline-card-title="記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル"
            user-name="Marialllescas"
            organization="○△×所属"
            timeline-card-follower-number="100"
            timeline-card-picks-number="5"
            timelien-card-pick-comment="ピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメント"
        />
        `
    }));




    