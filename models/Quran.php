<?php
/**
 * Created by PhpStorm.
 * User: Bahram
 * Date: 20.06.2020
 * Time: 16:18
 */

namespace app\models;
use yii\base\Model;

class Quran extends Model{
    public static function selectByMushaf(){
        return [
            'Фотиҳа'=>1, 'Бақара'=>1, 'Оли Имрон'=>49, 'Нисо'=>76, 'Моида'=>105, 'Әнъом'=>127, 'Аъроф'=>150, 'Анфол'=>176, 'Тавба'=>186, 'Юнус'=>207, 'Ҳуд'=>220, 'Юсуф'=>234, 'Раъд'=>248, 'Иброҳим'=>254, 'Ҳижр'=>261, 'Наҳл'=>268, 'Исро'=>281, 'Каҳф'=>292, 'Марям'=>304, 'Тоҳо'=>311, 'Анбиё'=>321, 'Ҳаж'=>331, 'Мўминун'=>341, 'Нур'=>349, 'Фурқон'=>358, 'Шуаро'=>366, 'Намл'=>376, 'Қасас'=>384, 'Анкабут'=>395, 'Рум'=>403, 'Луқмон'=>410, 'Сажда'=>414, 'Аҳзоб'=>417, 'Сабаъ'=>427, 'Фотир'=>433, 'Ёсин'=>439, 'Саффот'=>445, 'Сод'=>452, 'Зумар'=>457, 'Муъмин'=>466, 'Фуссилат'=>476, 'Шуро'=>482, 'Зуҳруф'=>488, 'Духон'=>495, 'Жосия'=>498, 'Аҳқоф'=>501, 'Муҳаммад'=>506, 'Фатҳ'=>510,'Ҳужурот'=>514, 'Қоф'=>517, 'Зарият'=>519, 'Тур'=>522, 'Нажм'=>525, 'Қамар'=>527, 'Раҳмон'=>530, 'Воқеа'=>533, 'Ҳадид'=>536, 'Мужодала'=>541, 'Хашр'=>544, 'Мумтахина'=>548, 'Саф'=>550, 'Жума'=>552, 'Мунофиқун'=>553, 'Тағобун'=>555, 'Талоқ'=>557, 'Тахрим'=>559, 'Мулк'=>561, 'Қалам'=>563, 'Хаққо'=>565, 'Маориж'=>567, 'Нуҳ'=>569, 'Жин'=>571, 'Муззаммил'=>573, 'Муддассир'=>574, 'Қиёмат'=>576, 'Инсон'=>577, 'Мурсалат'=>579, 'Наба'=>581, 'Назиат'=>582,'Абаса'=>584, 'Таквир'=>585, 'Инфитор'=>586, 'Мутаффифин'=>587, 'Иншиқоқ'=>588, 'Буруж'=>589, 'Ториқ'=>590, 'Аъла'=>591, 'Ғошия'=>591, 'Фажр'=>592, 'Балад'=>593, 'Шамс'=>594, 'Лайл'=>595, 'Духо'=>595, 'Инширох'=>596, 'Тийн'=>596, 'Алақ'=>597, 'Қадр'=>598, 'Баййина'=>598, 'Зилзал'=>599, 'Адият'=>599, 'Қория'=>600, 'Такасур'=>600, 'Аср'=>601, 'Ҳумаза'=>601, 'Фил'=>601, 'Қурайш'=>602, 'Моъун'=>602, 'Кавсар'=>602, 'Кофирун'=>603, 'Наср'=>603, 'Таббат'=>603, 'Ихлос'=>604, 'Фалақ'=>604, 'Нос'=>604
        ];
    }

    public static function selectById($id){
        $data =  [
            'Фотиҳа'=>1, 'Бақара'=>1, 'Оли Имрон'=>49, 'Нисо'=>76, 'Моида'=>105, 'Әнъом'=>127, 'Аъроф'=>150, 'Анфол'=>176, 'Тавба'=>186, 'Юнус'=>207, 'Ҳуд'=>220, 'Юсуф'=>234, 'Раъд'=>248, 'Иброҳим'=>254, 'Ҳижр'=>261, 'Наҳл'=>268, 'Исро'=>281, 'Каҳф'=>292, 'Марям'=>304, 'Тоҳо'=>311, 'Анбиё'=>321, 'Ҳаж'=>331, 'Мўминун'=>341, 'Нур'=>349, 'Фурқон'=>358, 'Шуаро'=>366, 'Намл'=>376, 'Қасас'=>384, 'Анкабут'=>395, 'Рум'=>403, 'Луқмон'=>410, 'Сажда'=>414, 'Аҳзоб'=>417, 'Сабаъ'=>427, 'Фотир'=>433, 'Ёсин'=>439, 'Саффот'=>445, 'Сод'=>452, 'Зумар'=>457, 'Муъмин'=>466, 'Фуссилат'=>476, 'Шуро'=>482, 'Зуҳруф'=>488, 'Духон'=>495, 'Жосия'=>498, 'Аҳқоф'=>501, 'Муҳаммад'=>506, 'Фатҳ'=>510,'Ҳужурот'=>514, 'Қоф'=>517, 'Зарият'=>519, 'Тур'=>522, 'Нажм'=>525, 'Қамар'=>527, 'Раҳмон'=>530, 'Воқеа'=>533, 'Ҳадид'=>536, 'Мужодала'=>541, 'Хашр'=>544, 'Мумтахина'=>548, 'Саф'=>550, 'Жума'=>552, 'Мунофиқун'=>553, 'Тағобун'=>555, 'Талоқ'=>557, 'Тахрим'=>559, 'Мулк'=>561, 'Қалам'=>563, 'Хаққо'=>565, 'Маориж'=>567, 'Нуҳ'=>569, 'Жин'=>571, 'Муззаммил'=>573, 'Муддассир'=>574, 'Қиёмат'=>576, 'Инсон'=>577, 'Мурсалат'=>579, 'Наба'=>581, 'Назиат'=>582,'Абаса'=>584, 'Таквир'=>585, 'Инфитор'=>586, 'Мутаффифин'=>587, 'Иншиқоқ'=>588, 'Буруж'=>589, 'Ториқ'=>590, 'Аъла'=>591, 'Ғошия'=>591, 'Фажр'=>592, 'Балад'=>593, 'Шамс'=>594, 'Лайл'=>595, 'Духо'=>595, 'Инширох'=>596, 'Тийн'=>596, 'Алақ'=>597, 'Қадр'=>598, 'Баййина'=>598, 'Зилзал'=>599, 'Адият'=>599, 'Қория'=>600, 'Такасур'=>600, 'Аср'=>601, 'Ҳумаза'=>601, 'Фил'=>601, 'Қурайш'=>602, 'Моъун'=>602, 'Кавсар'=>602, 'Кофирун'=>603, 'Наср'=>603, 'Таббат'=>603, 'Ихлос'=>604, 'Фалақ'=>604, 'Нос'=>604
        ];
//        debug($data);die;
        return array_keys($data, $id);
    }

    public static function selectByAlphabet(){
        return [
            'Фотиҳа'=>1, 'Бақара'=>1, 'Оли Имрон'=>49, 'Нисо'=>76, 'Моида'=>105, 'Анъом'=>127, 'Аъроф'=>150, 'Анфол'=>176, 'Тавба'=>186, 'Юнус'=>207, 'Ҳуд'=>220, 'Юсуф'=>234, 'Раъд'=>248, 'Иброҳим'=>254, 'Ҳижр'=>261, 'Наҳл'=>268, 'Исро'=>281, 'Каҳф'=>292, 'Марям'=>304, 'Тоҳо'=>311, 'Анбиё'=>321, 'Ҳаж'=>331, 'Мўминун'=>341, 'Нур'=>349, 'Фурқон'=>358, 'Шуаро'=>366, 'Намл'=>376, 'Қасас'=>384, 'Анкабут'=>395, 'Рум'=>403, 'Луқмон'=>410, 'Сажда'=>414, 'Аҳзоб'=>417, 'Сабаъ'=>427, 'Фотир'=>433, 'Ёсин'=>439, 'Саффот'=>445, 'Сод'=>452, 'Зумар'=>457, 'Муъмин'=>466, 'Фуссилат'=>476, 'Шуро'=>482, 'Зуҳруф'=>488, 'Духон'=>495, 'Жосия'=>498, 'Аҳқоф'=>501, 'Муҳаммад'=>506, 'Фатҳ'=>510,'Ҳужурот'=>514, 'Қоф'=>517, 'Зарият'=>519, 'Тур'=>522, 'Нажм'=>525, 'Қамар'=>527, 'Раҳмон'=>530, 'Воқеа'=>533, 'Ҳадид'=>536, 'Мужодала'=>541, 'Хашр'=>544, 'Мумтахина'=>548, 'Саф'=>550, 'Жума'=>552, 'Мунофиқун'=>553, 'Тағобун'=>555, 'Талоқ'=>557, 'Тахрим'=>559, 'Мулк'=>561, 'Қалам'=>563, 'Хаққо'=>565, 'Маориж'=>567, 'Нуҳ'=>569, 'Жин'=>571, 'Муззаммил'=>573, 'Муддассир'=>574, 'Қиёмат'=>576, 'Инсон'=>577, 'Мурсалат'=>579, 'Наба'=>581, 'Назиат'=>582,'Абаса'=>584, 'Таквир'=>585, 'Инфитор'=>586, 'Мутаффифин'=>587, 'Иншиқоқ'=>588, 'Буруж'=>589, 'Ториқ'=>590, 'Аъла'=>591, 'Ғошия'=>591, 'Фажр'=>592, 'Балад'=>593, 'Шамс'=>594, 'Лайл'=>595, 'Духо'=>595, 'Инширох'=>596, 'Тийн'=>596, 'Алақ'=>597, 'Қадр'=>598, 'Баййина'=>598, 'Зилзал'=>599, 'Адият'=>599, 'Қория'=>600, 'Такасур'=>600, 'Аср'=>601, 'Ҳумаза'=>601, 'Фил'=>601, 'Қурайш'=>602, 'Моъун'=>602, 'Кавсар'=>602, 'Кофирун'=>603, 'Наср'=>603, 'Таббат'=>603, 'Ихлос'=>604, 'Фалақ'=>604, 'Нос'=>604
        ];
    }
}