
import Vue from 'vue';
import {storiesOf} from '@storybook/vue';
import PostCard from './PostCard';

storiesOf('PostCard', module)
    .add('simple', () => ({
        components: {PostCard},
        template: `
            <post-card 
                notify-comment="[ユーザ2がピックしました]"
                notify-time="3分前"
                postcard-title="記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル"
                postcard-description="ディスクリプションディスクリプションディスクリプションディスクリプションディスクリプションディスクリプション"
                postcardPicksNumber="100"
                postcardPvNumber="3"
                />
            `
    }));




    