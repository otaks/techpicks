
import Vue from 'vue';
import {storiesOf} from '@storybook/vue';
import TitleCard from './TitleCard';

storiesOf('TitleCard', module)
    .add('simple', () => ({
        components: {TitleCard},
        template: `
            <title-card 
                notify-comment="[ユーザ2がピックしました]"
                notify-time="3分前"
                titlecard-title="記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル"
                titleComment="ピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメントピックコメント"
                man-name="Marialllescas"
                follower-num="13"
                title-num="2"
                shozoku="〇×△株式会社"
                like-num="4"
                titlecardtitlesNumber="100"
                titlecardPvNumber="3"
                titlecard-description="ディスクリプションディスクリプションディスクリプションディスクリプションディスクリプションディスクリプションディスクリプションディスクリプションディスクリプション"                
                />
            `
    }));




    